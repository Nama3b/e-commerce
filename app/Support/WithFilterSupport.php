<?php

namespace App\Support;

use App\Exceptions\OverlapException;

trait WithFilterSupport
{
    /**
     * @param $query
     * @param array $variable
     * @return void
     */

    protected function filterLike($query, array $variable = []): void
    {
        foreach ($variable as $singleFilter) {
            if ($this->filledAndEmpty($singleFilter)) {
                $query->where($singleFilter, 'LIKE', '%' . $this->escapeLike($this->request->input($singleFilter)) . '%');
            }
        }
    }

    /**
     * @param string $value
     * @param string $char
     * @return string
     */
    public function escapeLike(string $value, string $char = '\\'): string
    {
        return str_replace(
            [$char, '%'],
            [$char . $char, $char . '%'],
            $value
        );
    }

    /**
     * @param $element
     * @return bool
     */
    protected function filledAndEmpty($element): bool
    {
        return $this->request->filled($element) && $this->request->input($element);
    }

    /**
     * @param $query
     * @param array $variable
     * @return void
     */
    protected function filter($query, array $variable = []): void
    {
        foreach ($variable as $singleFilter) {
            if ($this->filledAndEmpty($singleFilter)) {
                if ($singleFilter == 'team' && $this->request->input($singleFilter) == 'なし') {
                    $query->where(function ($q) {
                        $q->whereNull('team')
                            ->orWhere('team', 'なし')
                            ->orWhere('team', '');
                    });
                } else {
                    $query->where($singleFilter, $this->request->input($singleFilter));
                }
            }
        }
    }

    /**
     * @param $query
     * @param array $variable
     * @return void
     */
    protected function filterBool($query, array $variable = []): void
    {
        foreach ($variable as $singleFilter) {

            if ($this->request->filled($singleFilter)) {
                $query->where($singleFilter, $this->request->input($singleFilter));
            }
        }
    }

    /**
     * @param $query
     * @param array $variable
     * @return void
     */
    protected function filterDate($query, array $variable = []): void
    {
        foreach ($variable as $singleFilter) {
            if ($this->request->filled($singleFilter)) {
                $query->whereDate($singleFilter, $this->request->input($singleFilter));
            }
        }
    }

    /**
     * @param $query
     * @param string $sortBy
     * @param string $sortType
     * @param array $sortList
     * @return void
     * @throws OverlapException
     */
    protected function sortBy($query, string $sortBy, string $sortType, array $sortList = []): void
    {
        $this->validateSortBy($sortBy, $sortList);
        $this->validateSortType($sortType);

        $query->orderBy($sortBy, $sortType);
    }

    /**
     * @param $sortBy
     * @param $sortList
     * @return void
     * @throws OverlapException
     */
    private function validateSortBy($sortBy, $sortList): void
    {
        if (!in_array($sortBy, $sortList)) {
            throw new OverlapException;
        }

    }

    /**
     * @param $sortBy
     * @return void
     * @throws OverlapException
     */
    private function validateSortType($sortBy): void
    {
        if (!in_array(strtoupper($sortBy), ['DESC', 'ASC'])) {
            throw new OverlapException;
        }
    }

    /**
     * @param $query
     * @param $colum
     * @param $aliasRequest
     * @return void
     */
    protected function filterWhereInAlias($query, $colum, $aliasRequest): void
    {
        if ($this->filledAndEmpty($aliasRequest)) {
            $query->whereIn($colum, $this->buildWhereIn($aliasRequest));
        }
    }

    /**
     * @param $variable
     * @return mixed|string[]
     */
    private function buildWhereIn($variable): mixed
    {
        return is_array($this->request->input($variable)) ? $this->request->input($variable) :
            explode(",", $this->request->input($variable));
    }

    /**
     * @param $condition
     * @param $date
     * @param bool $first
     * @param string $columnValidTo
     * @param string $columnValidFrom
     * @return void
     */
    protected function overlapDate($condition, $date, bool $first = false,
                                   string $columnValidTo = 'valid_to', string $columnValidFrom = 'valid_from'): void
    {
        $condition->{$first ? 'where' : 'orWhere'}(function ($query) use ($columnValidFrom, $columnValidTo, $date) {
            $query->where(function ($sub) use ($columnValidFrom, $columnValidTo, $date) {
                $sub->whereNotNull($columnValidTo)
                    ->whereRaw('? between ' . $columnValidFrom . ' and ' . $columnValidTo,
                        [$date]);
            })->orWhere(function ($sub) use ($columnValidFrom, $columnValidTo, $date) {
                $sub->whereNull($columnValidTo)
                    ->where($columnValidFrom, '<=', $date);
            });
        });
    }

    /**
     * @param $condition
     * @param $from
     * @param $to
     * @param bool $first
     * @return void
     */
    protected function validDataTo($condition, $from, $to, bool $first = false): void
    {
        $condition->{$first ? 'where' : 'orWhere'}(function ($query) use ($from, $to) {
            $query->where(function ($sub) use ($from, $to) {
                $sub->whereNotNull('valid_to')
                    ->whereRaw('? between valid_from and valid_to',
                        [$to])
                    ->orWhere(function ($query) use ($from, $to) {
                        $query->where('valid_from', '>=', $from)
                            ->where('valid_to', '<=', $to);
                    });
            })->orWhere(function ($sub) use ($to) {
                $sub->whereNull('valid_to')
                    ->where('valid_from', '<=', $to);
            });
        });
    }

    /**
     * @param $q
     * @param $reject
     * @return void
     */
    private function allowReject($q, $reject): void
    {
        if ($reject) {
            $q->whereColumn('route_action_id', '!=', 'actual_route_status_id')
                ->orWhereNull('actual_route_status_id');
        } else {
            $q->whereNull('actual_route_status_id');
        }
    }

    /**
     * @param bool $first
     * @return string
     */
    protected function conditionWhere(bool $first = false): string
    {
        return $first ? 'where' : 'orWhere';
    }
}
