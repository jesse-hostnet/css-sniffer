<?php
/**
 * @copyright 2017 Hostnet B.V.
 */
declare(strict_types=1);

namespace Hostnet\Component\CssSniff\Configuration;

use Hostnet\Component\CssSniff\File;
use Yannickl88\Component\CSS\Tokenizer;

final class StdinConfiguration implements SnifferConfigurationInterface
{
    public function getFiles(): array
    {
        $contents = '';
        while (!feof(STDIN)) {
            $contents .= fread(STDIN, 1024);
        }

        return [new File('stdin', (new Tokenizer())->tokenize($contents))];
    }
}