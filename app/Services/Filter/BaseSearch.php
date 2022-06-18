<?php

namespace App\Services\Filter;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

trait BaseSearch
{
    /**
     * Return name of model.
     * 
     * @return object
     */
    public function getObject(): object
    {
        $className = self::MODEL;
        return new $className;
    }

    /**
     * Return space of name.
     * 
     * @return string.
     */
    protected function getNameSpace(): string
    {
        return (new \ReflectionObject($this))->getNamespaceName();
    }

    /**
     * Apply filter.
     * 
     * @param Request $request
     * @return Builder
     */
    public function apply(Request $request): Builder
    {
        $query = $this->applyObjectsFromRequest($request, $this->getObject()->newQuery());
        return $this->getResults($query);
    }

    /**
     * Apply filter for model.
     * 
     * @param Request $request
     * @param Builder $query
     * @return Builder
     */
    private function applyObjectsFromRequest(Request $request, Builder $query): Builder
    {
        foreach ($request->all() as $filterName => $value) {
            $value = trim($value);
            if (empty($value) && ($value != 0 || $value === "")) {
                continue;
            }

            $object = $this->createFilterObject($filterName);

            if ($this->isValidObject($object)) {
                $query = $object::apply($query, $value);
            }
        }

        return $query;
    }

    /**
     * Create object for filter.
     * 
     * @param string $name
     * @return string
     */
    private function createFilterObject(string $name): string
    {
        return $this->getNameSpace() . '\\' . Str::studly($name);
    }

    /**
     * Check to valid object.
     * 
     * @param string $decorator
     * @return bool
     */
    private function isValidObject(string $decorator): bool
    {
        return class_exists($decorator);
    }

    /**
     * Return results.
     * 
     * @param Builder
     * @return Builder
     */
    private function getResults(Builder $query): Builder
    {
        return $query;
    }
}
