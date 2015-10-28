<?php
/**
 * Spiral: PSR7 aware cURL client (https://github.com/juliangut/spiral)
 *
 * @link https://github.com/juliangut/spiral for the canonical source repository
 * @license https://raw.githubusercontent.com/juliangut/spiral/master/LICENSE
 */

namespace Jgut\Spiral\Option;

use Jgut\Spiral\Option;
use Jgut\Spiral\Exception\CurlOptionException;

class HttpVersion implements Option
{
    use OptionAware;

    /**
     * cURL option.
     *
     * @var int
     */
    protected $option = CURLOPT_HTTP_VERSION;

    /**
     * Set option value.
     *
     * @param float|string $value
     * @throws \Jgut\Exception\CurlOptionException
     */
    protected function setValue($value)
    {
        $value = number_format(floatval($value), 1, '.', '');

        if (!preg_match('/^1.(0|1)$/', $value)) {
            throw new CurlOptionException(sprintf('"%s" is not a valid HTTP version', $value));
        }

        $this->value = constant('CURL_HTTP_VERSION_' . str_replace('.', '_', $value));
    }
}
