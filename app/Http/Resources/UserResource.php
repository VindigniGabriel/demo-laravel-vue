<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'roles' => array_map(
                function ($role) {
                    return $role['name'];
                },
                $this->roles->toArray()
            ),
            'permissions' => array_map(
                function ($permission) {
                    return $permission['name'];
                },
                $this->getAllPermissions()->toArray()
            ),
            'avatar' => 'https://media-exp1.licdn.com/dms/image/C4E03AQEm0kMOXDorAA/profile-displayphoto-shrink_200_200/0?e=1596672000&v=beta&t=tN2HQp9yr4ehWV8qrEATssYJa8Fq_BPS40X02kTfUhw',
        ];
    }
}
