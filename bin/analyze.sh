#!/bin/bash

echo "Run PHP CS"
echo "....."
./vendor/bin/phpcs --standard=ruleset.xml src
echo "Finished"
echo "-------------"
echo "Psalm"
echo "....."
./vendor/bin/psalm --show-info=true
echo "Finished"
