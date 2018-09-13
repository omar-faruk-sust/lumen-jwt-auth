<?php
/**
 * Created by PhpStorm.
 * User: omarf
 * Date: 9/13/2018
 * Time: 3:15 PM
 */

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'github' => $this->github,
            'twitter' => $this->twitter,
            'location' => $this->location,
            'latest_article_published' => $this->latest_article_published,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}