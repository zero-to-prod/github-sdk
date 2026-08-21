<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Generator;

use Stringable;

/**
 * One thing the generator did not turn into the obvious output, and why.
 *
 * Nothing is ever dropped silently: an unsupported construct becomes a Skip,
 * gets counted, and shows up in the run summary. A Skip is not necessarily a
 * problem — reusing a `nullable-x` twin's class is recorded here too — it is
 * simply the audit trail for "the document said X and we emitted Y".
 *
 * @internal
 */
final class Skip implements Stringable
{
    /** Kind for a schema that produced no class of its own. */
    public const SCHEMA = 'schema';

    /** Kind for an enum declaration that could not become a PHP backed enum. */
    public const ENUM = 'enum';

    /** Kind for a property whose type had to be widened. */
    public const PROPERTY = 'property';

    /** Kind for an HTTP operation that produced no API method. */
    public const OPERATION = 'operation';

    /** Kind for a request or response body that produced no model. */
    public const BODY = 'body';

    /** Kind for a path that produced no route case. */
    public const PATH = 'path';

    /** Kind for webhook definitions left out of the run. */
    public const WEBHOOK = 'webhook';

    public function __construct(
        public readonly string $kind,
        public readonly string $subject,
        public readonly string $reason,
    ) {}

    public function __toString(): string
    {
        return "[$this->kind] $this->subject — $this->reason";
    }
}
