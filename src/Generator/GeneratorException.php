<?php

declare(strict_types=1);

namespace Zerotoprod\Sdk\Generator;

use RuntimeException;

/**
 * Every failure the generator raises. Carries a message written for a human
 * running `./run generate-sdk`, never a stack-trace-only error.
 *
 * @internal
 */
class GeneratorException extends RuntimeException {}
