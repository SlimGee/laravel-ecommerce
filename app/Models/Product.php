<?php

namespace App\Models;

use App\Null\MediaAlly\DefaultMedia;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasFactory;
    use HasSlug;
    use MediaAlly {
        MediaAlly::fetchAllMedia as fetchMedia;
    }
    use Searchable;

    /**
     * The attributes that should not be mass assignable
     *
     * @var array
     */
    protected $guarded = [];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the category that own this product
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the options that belong to this product
     */
    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }

    /**
     * Get the variations that belong to this product
     */
    public function variations(): BelongsToMany
    {
        return $this->belongsToMany(Variation::class);
    }

    /*
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'slug' => $this->slug,
        ];
    }

    /**
     * Scope a query to only include listings that are returned by scout
     */
    public function scopeWhereScout(Builder $query, string $search): Builder
    {
        return $query->whereIn(
            'id',
            self::search($search)
                ->get()
                ->pluck('id'),
        );
    }

    /**
     * Fetch all media that belong to this product
     */
    public function media(): Collection
    {
        $media = $this->fetchMedia();

        if ($media->count() < 1) {
            return collect([new DefaultMedia]);
        }

        return $media;
    }

    /**
     * @see Product::media()
     */
    public function fetchAllMedia(): Collection
    {
        return $this->media();
    }
}
