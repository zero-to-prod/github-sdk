<?php

namespace Zerotoprod\GitHubSdk\Factories;

use Zerotoprod\DataModelFactory\DataModelFactory;
use Zerotoprod\GitHubSdk\Models\Pagination;

class PaginationFactory
{
    use DataModelFactory;

    protected $model = Pagination::class;

    protected function definition(): array
    {
        return [
            Pagination::current_page => 1,
            Pagination::last_page => 1,
            Pagination::per_page => 10,
            Pagination::total => 1,
            Pagination::next_page_url => null,
            Pagination::prev_page_url => null,
        ];
    }

    public function make(array $context = []): Pagination
    {
        return $this->instantiate($context);
    }
}
