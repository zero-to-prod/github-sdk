# Shared bootstrap for every script in this directory. Sourced, never executed.
#
# The old `./run` dispatcher exported SCRIPT_DIR and PHP_VERSION before dispatching. Composer
# exports neither, so each script resolves them itself. Sourcing this twice is
# harmless: every value is only set when still unset.

SCRIPT_DIR="${SCRIPT_DIR:-$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)}"
export SCRIPT_DIR

# Remember an explicit `PHP_VERSION=8.4 composer test` before .env can clobber it.
_php_version_from_caller="${PHP_VERSION:-}"

if [[ -f "$SCRIPT_DIR/.env" ]]; then
    source "$SCRIPT_DIR/.env"
fi

# Precedence: caller, then .env, then the oldest version the package supports.
if [[ -n "$_php_version_from_caller" ]]; then
    PHP_VERSION="$_php_version_from_caller"
fi

unset _php_version_from_caller
export PHP_VERSION="${PHP_VERSION:-8.1}"
