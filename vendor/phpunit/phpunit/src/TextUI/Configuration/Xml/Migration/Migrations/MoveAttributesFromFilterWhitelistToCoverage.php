<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\TextUI\XmlConfiguration;

use DOMDocument;
use DOMElement;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 *
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final readonly class MoveAttributesFromFilterWhitelistToCoverage implements Migration
{
    /**
     * @throws MigrationException
     */
    public function migrate(DOMDocument $document): void
    {
        $whitelist = $document->getElementsByTagName('whitelist')->item(0);

        if ($whitelist === null) {
            return;
        }

        $coverage = $document->getElementsByTagName('coverage')->item(0);

        if (!$coverage instanceof DOMElement) {
            throw new MigrationException('Unexpected state - No coverage element');
        }

        $map = [
            'addUncoveredFilesFromWhitelist'     => 'includeUncoveredFiles',
            'processUncoveredFilesFromWhitelist' => 'processUncoveredFiles',
        ];

        foreach ($map as $old => $new) {
            if (!$whitelist->hasAttribute($old)) {
                continue;
            }

            $coverage->setAttribute($new, $whitelist->getAttribute($old));
            $whitelist->removeAttribute($old);
        }
    }
}
