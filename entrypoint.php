#!/usr/bin/env php
<?php

function start_echo($msg)
{
    echo $msg;
}

function end_echo(float $seconds)
{
    echo sprintf('Done in %.3fs' . PHP_EOL, $seconds);
}

function dummy_action()
{
    return sha1("Same string every time");
}

function format_bytes($bytes, $precision = 2)
{
    $units = array('B', 'KB', 'MB', 'GB', 'TB');

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    $bytes /= (1 << (10 * $pow));

    return round($bytes, $precision) . ' ' . $units[$pow];
}

function print_memory_usage()
{
    echo 'Memory usage: ' . format_bytes(memory_get_peak_usage(true)) . PHP_EOL;
}


class IntegerEnum
{
    const OPTION_0 = 0;
    const OPTION_1 = 1;
    const OPTION_2 = 2;
    const OPTION_3 = 3;
    const OPTION_4 = 4;
    const OPTION_5 = 5;
    const OPTION_6 = 6;
    const OPTION_7 = 7;
    const OPTION_8 = 8;
    const OPTION_9 = 9;
}

class StringEnum
{
    const OPTION_0 = 'zero';
    const OPTION_1 = 'first';
    const OPTION_2 = 'second';
    const OPTION_3 = 'third';
    const OPTION_4 = 'forth';
    const OPTION_5 = 'fifth';
    const OPTION_6 = 'sixth';
    const OPTION_7 = 'seventh';
    const OPTION_8 = 'eighth';
    const OPTION_9 = 'nineth';
}

class SampleArrayGenerator
{
    const LIMIT = 3e6;
    const DUMMY_STRING = 'Dummy string';

    const AVAILABLE_INTEGERS = [
        IntegerEnum::OPTION_0,
        IntegerEnum::OPTION_1,
        IntegerEnum::OPTION_2,
        IntegerEnum::OPTION_3,
        IntegerEnum::OPTION_4,
        IntegerEnum::OPTION_5,
        IntegerEnum::OPTION_6,
        IntegerEnum::OPTION_7,
        IntegerEnum::OPTION_8,
        IntegerEnum::OPTION_9,
    ];

    const AVAILABLE_STRINGS = [
        StringEnum::OPTION_0,
        StringEnum::OPTION_1,
        StringEnum::OPTION_2,
        StringEnum::OPTION_3,
        StringEnum::OPTION_4,
        StringEnum::OPTION_5,
        StringEnum::OPTION_6,
        StringEnum::OPTION_7,
        StringEnum::OPTION_8,
        StringEnum::OPTION_9,
    ];

    public static function getIntegerList(): array
    {
        return self::getSampleList(self::AVAILABLE_INTEGERS);
    }

    public static function getStringList(): array
    {
        return self::getSampleList(self::AVAILABLE_STRINGS);
    }

    private static function getSampleList(array $availableValues): array
    {
        $start = microtime(true);
        start_echo('Generating sample list...');
        $values = [];
        for ($i = 0; $i < self::LIMIT; $i++) {
            $values[] = $availableValues[random_int(0, count($availableValues) - 1)];
        }
        $end = microtime(true);
        end_echo(($end - $start));
        return $values;
    }
}

class EvaluateSwitch
{

    public function __construct(array $integers, array $strings)
    {
        $start = microtime(true);
        start_echo('Processing switch with integers ...');
        $this->withInteger($integers);
        $end = microtime(true);
        end_echo(($end - $start));
        $start = $end;

        start_echo('Processing switch with strings ...');
        $this->withString($strings);
        $end = microtime(true);
        end_echo(($end - $start));
    }

    private function withString(array $data)
    {
        foreach ($data as $singleData) {
            switch ($singleData) {
                case StringEnum::OPTION_0:
                    dummy_action();
                    break;
                case StringEnum::OPTION_1:
                    dummy_action();
                    break;
                case StringEnum::OPTION_2:
                    dummy_action();
                    break;
                case StringEnum::OPTION_3:
                    dummy_action();
                    break;
                case StringEnum::OPTION_4:
                    dummy_action();
                    break;
                case StringEnum::OPTION_5:
                    dummy_action();
                    break;
                case StringEnum::OPTION_6:
                    dummy_action();
                    break;
                case StringEnum::OPTION_7:
                    dummy_action();
                    break;
                case StringEnum::OPTION_8:
                    dummy_action();
                    break;
                case StringEnum::OPTION_9:
                    dummy_action();
                    break;
                default:
                    throw new \InvalidArgumentException('Undefined option');
                    break;
            }
        }
    }

    private function withInteger(array $data)
    {
        foreach ($data as $singleData) {
            switch ($singleData) {
                case IntegerEnum::OPTION_0:
                    dummy_action();
                    break;
                case IntegerEnum::OPTION_1:
                    dummy_action();
                    break;
                case IntegerEnum::OPTION_2:
                    dummy_action();
                    break;
                case IntegerEnum::OPTION_3:
                    dummy_action();
                    break;
                case IntegerEnum::OPTION_4:
                    dummy_action();
                    break;
                case IntegerEnum::OPTION_5:
                    dummy_action();
                    break;
                case IntegerEnum::OPTION_6:
                    dummy_action();
                    break;
                case IntegerEnum::OPTION_7:
                    dummy_action();
                    break;
                case IntegerEnum::OPTION_8:
                    dummy_action();
                    break;
                case IntegerEnum::OPTION_9:
                    dummy_action();
                    break;
                default:
                    throw new \InvalidArgumentException('Undefined option');
                    break;
            }
        }
    }
}

class EvaluateMapping
{

    private $mapping;

    public function __construct(array $integers, array $strings)
    {
        $this->initializeMapping();

        $start = microtime(true);
        start_echo('Processing mapping with integers ...');
        $this->withStringsAndIntegers($integers);
        $end = microtime(true);
        end_echo(($end - $start));
        $start = $end;

        start_echo('Processing mapping with strings ...');
        $this->withStringsAndIntegers($strings);
        $end = microtime(true);
        end_echo(($end - $start));
    }

    private function withStringsAndIntegers(array $data)
    {
        foreach ($data as $singleData) {

            $this->checkOptionExists($singleData);

            $doNothing = $this->mapping[$singleData];
        }
    }

    private function checkOptionExists($singleData): void
    {
        if (!isset($this->mapping[$singleData])) {
            throw new \InvalidArgumentException('Undefined option');
        }
    }

    private function initializeMapping()
    {
        $this->mapping = [
            IntegerEnum::OPTION_0 => dummy_action(),
            IntegerEnum::OPTION_1 => dummy_action(),
            IntegerEnum::OPTION_2 => dummy_action(),
            IntegerEnum::OPTION_3 => dummy_action(),
            IntegerEnum::OPTION_4 => dummy_action(),
            IntegerEnum::OPTION_5 => dummy_action(),
            IntegerEnum::OPTION_6 => dummy_action(),
            IntegerEnum::OPTION_7 => dummy_action(),
            IntegerEnum::OPTION_8 => dummy_action(),
            IntegerEnum::OPTION_9 => dummy_action(),

            StringEnum::OPTION_0 => dummy_action(),
            StringEnum::OPTION_1 => dummy_action(),
            StringEnum::OPTION_2 => dummy_action(),
            StringEnum::OPTION_3 => dummy_action(),
            StringEnum::OPTION_4 => dummy_action(),
            StringEnum::OPTION_5 => dummy_action(),
            StringEnum::OPTION_6 => dummy_action(),
            StringEnum::OPTION_7 => dummy_action(),
            StringEnum::OPTION_8 => dummy_action(),
            StringEnum::OPTION_9 => dummy_action(),
        ];
    }
}

ini_set('memory_limit', '-1');
$integers = SampleArrayGenerator::getIntegerList();
$strings = SampleArrayGenerator::getStringList();

new EvaluateMapping($integers, $strings);
new EvaluateSwitch($integers, $strings);

print_memory_usage();
