<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Query parameter DSL keys for list endpoints (e.g. `listAccounts`,
 * `listAccountProviders`). Pass values under `$options[Options::query]` on the
 * API client; the package normalizes nested shapes into the wire format the
 * service expects.
 *
 * Use these constants when building a query array so the keys stay in
 * lockstep with the DSL even if names change:
 *
 *     $api->listAccounts([Options::query => [
 *         Query::where  => ['email', 'LIKE', '%@example.com'],
 *         Query::with   => ['providers', 'mfaMethods'],
 *         Query::fields => ['accounts' => ['id', 'email']],
 *     ]]);
 *
 * Normalization is performed by {@see \Zerotoprod\GitHubSdk\Internal\QueryNormalizer}.
 *
 * @link https://docs.github.com/
 */
class Query
{
    use DataModel;

    /**
     * Filter conditions. Accepted input shapes (the normalizer reduces all
     * forms to a list of tuples on the wire — `where[i][0]=col&where[i][1]=val`):
     *
     *  - 2-tuple `['col', 'val']`           → operator defaults to `=`
     *  - 3-tuple `['col', 'op', 'val']`     → explicit operator e.g. `LIKE`, `>=`
     *  - List of tuples `[['c1','v1'], ['c2','v2']]` → AND'd together
     *  - Assoc shorthand `['col' => 'val']` → equality only
     *
     * Usage: `$api->listAccounts([Options::query => [Query::where => ['email', 'LIKE', '%@x.com']]]);`
     *
     * @see $where
     */
    public const where = 'where';
    /**
     * Filter conditions — see the {@see self::where} constant for accepted
     * shapes. Defaults to no filter.
     *
     * @var array<int|string, mixed>
     */
    #[Describe(['default' => []])]
    public array $where;

    /**
     * `IN` filters — restrict a column to a set of values. Map of
     * `column => values`; passed through to the wire unchanged
     * (`where_in[col][0]=a&where_in[col][1]=b`):
     *
     *  - `['status' => ['active', 'pending']]`
     *
     * Usage: `$api->listAccounts([Options::query => [Query::where_in => ['status' => ['active', 'pending']]]]);`
     *
     * @see $where_in
     */
    public const where_in = 'where_in';
    /**
     * `IN` filters — see the {@see self::where_in} constant. Map of
     * `column => array<scalar>`. Defaults to no filter.
     *
     * @var array<string, array<int, scalar>>
     */
    #[Describe(['default' => []])]
    public array $where_in;

    /**
     * `NOT IN` filters — exclude a column's values. Same shape as
     * {@see self::where_in}; passed through unchanged
     * (`where_not_in[col][0]=archived`):
     *
     *  - `['status' => ['archived']]`
     *
     * Usage: `$api->listAccounts([Options::query => [Query::where_not_in => ['status' => ['archived']]]]);`
     *
     * @see $where_not_in
     */
    public const where_not_in = 'where_not_in';

    /**
     * `NOT IN` filters — see the {@see self::where_not_in} constant. Map of
     * `column => array<scalar>`. Defaults to no filter.
     *
     * @var array<string, array<int, scalar>>
     */
    #[Describe(['default' => []])]
    public array $where_not_in;

    /**
     * Eager-load relations (Eloquent-style). Accepted input shapes (the
     * normalizer reduces all forms to a comma-joined dotted-path string on
     * the wire — `with=providers,mfaMethods.account`):
     *
     *  - String `'providers'` or dotted `'providers.account'` (passed through)
     *  - List `['providers', 'mfaMethods']`
     *  - Nested map `['providers' => ['account']]` → `providers.account`
     *
     * Usage: `$api->listAccounts([Options::query => [Query::with => ['providers', 'mfaMethods']]]);`
     *
     * @see $with
     */
    public const with = 'with';

    /**
     * Eager-load relations — see the {@see self::with} constant for accepted
     * shapes. May be a string (dotted path), a list of relation names, or a
     * nested map. Defaults to no eager loading.
     *
     * @var string|array<int|string, mixed>
     */
    #[Describe(['default' => []])]
    public string|array $with;

    /**
     * Sparse fieldsets per relation. Input is a map of `relation => columns`;
     * column arrays are comma-joined on the wire — `fields[accounts]=id,email`.
     *
     *  - `['accounts' => ['id', 'email']]` restricts the parent resource
     *  - `['providers' => ['user_id']]`    restricts an eager-loaded relation
     *
     * The key matches the relation/resource name (singular for a `with`
     * relation, plural for the parent collection).
     *
     * Usage: `$api->getAccount($id, [Options::query => [Query::fields => ['accounts' => ['id', 'email']]]]);`
     *
     * @see $fields
     */
    public const fields = 'fields';
    /**
     * Sparse fieldsets per relation — see the {@see self::fields} constant.
     * Map of `relation => string[]` (column names). Defaults to all columns.
     *
     * @var array<string, array<int, string>|string>
     */
    #[Describe(['default' => []])]
    public array $fields;

    /**
     * Page size for paginated list endpoints. Scalar integer, passed through
     * unchanged (`per_page=50`). Omit to use the service default.
     *
     * Usage: `$api->listAccounts([Options::query => [Query::per_page => 50]]);`
     *
     * @see $per_page
     */
    public const per_page = 'per_page';
    /**
     * Page size — see the {@see self::per_page} constant. Null omits the
     * parameter and uses the service default.
     *
     * @var int|null
     */
    #[Describe(['default' => null])]
    public ?int $per_page;
}
