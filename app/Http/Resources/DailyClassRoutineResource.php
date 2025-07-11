<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DailyClassRoutineResource extends JsonResource
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
            'id'           => $this->id,
            'date'         => $this->date,
            'start_time'   => $this->start_time,
            'end_time'     => $this->end_time,
            'is_break'     => $this->is_break,
            'remarks'      => $this->remarks,

            'subject' => $this->whenLoaded('subject', function () {
                return [
                    'id'   => $this->subject?->id,
                    'name' => $this->subject?->name,
                ];
            }),

            'teacher' => $this->whenLoaded('teacher', function () {
                return [
                    'id'   => $this->teacher?->id,
                    'name' => $this->teacher?->name,  // Ensure accessor on Teacher model
                ];
            }),

            'grade' => $this->whenLoaded('grade', function () {
                return [
                    'id'   => $this->grade?->id,
                    'name' => $this->grade?->name,
                ];
            }),

            'section' => $this->whenLoaded('section', function () {
                return [
                    'id'   => $this->section?->id,
                    'name' => $this->section?->name,
                ];
            }),
        ];
    }
}
