<?php


namespace Tests\Feature\Util;


trait WithResourceRoutes
{
    protected $resource;

    protected function registerResource($resource)
    {
        $this->resource = $resource;
    }
    
    protected function indexRoute()
    {
        return route("$this->resource.index");
    }

    protected function createRoute()
    {
        return route("$this->resource.create");
    }

    protected function storeRoute()
    {
        return route("$this->resource.store");
    }

    protected function editRoute($id)
    {
        return route("$this->resource.edit", [$this->resource => $id]);
    }

    protected function updateRoute($id)
    {
        return route("$this->resource.update", [$this->resource => $id]);
    }

    protected function deleteRoute($id)
    {
        return route("$this->resource.delete", [$this->resource => $id]);
    }
}