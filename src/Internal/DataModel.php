<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Internal;

use Zerotoprod\DataModelHelper\DataModelHelper;

/** @internal */
trait DataModel
{
    use \Zerotoprod\DataModel\DataModel;
    use Transformable;
    use DataModelHelper;
}
