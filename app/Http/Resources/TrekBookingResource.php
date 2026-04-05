<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TrekBookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'trek_name' => $this->package->name ?? '—',
            'departure_date' => $this->departure->start_date ?? '—',
            'traveller_count' => $this->total_travellers ?? 0,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            
            // Note: If expanded view in frontend needs more data, 
            // we should include user and travellers fields here too.
            // But following the "data only" request for index list.
            'user' => $this->whenLoaded('user', function() {
                return [
                    'name' => trim(($this->user->fname ?? '') . ' ' . ($this->user->lname ?? '')) ?: $this->user->name,
                    'email' => $this->user->email,
                    'phone' => $this->user->mobile_no ?? $this->user->phone,
                ];
            }),
            'travellers' => $this->travellers,
            'flight' => $this->flight,
            'insurance' => $this->insurance,
            'special_requirements' => $this->special_requirements,
        ];
    }
}
