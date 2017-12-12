<?php
/**
 * Created by PhpStorm.
 * User: tdutrion
 * Date: 12/12/2017
 * Time: 09:37
 */

namespace Application\Router;


use Exception;

class ParseUriDotNotationHelper implements ParseUriHelper
{
    /**
     * @param string $requestUri
     * @return string
     * @throws Exception
     */
    public function parseUri(string $requestUri): string
    {
        if (\strpos($requestUri, '.') === false) {
            throw new Exception('L\'URL fournie ne reponds pas au pattern défini');
        }

        $requestedFile = \substr(
            $requestUri,
            0,
            \strpos($requestUri, '.')
        );

        if ($requestedFile[0] === '/') {
            $requestedFile = \substr($requestedFile, 1);
        }

        $requestedFile = \ucfirst($requestedFile);

        return "\Application\Controller\\{$requestedFile}Controller";
    }
}
