<?php

declare(strict_types = 1);

namespace OpenDocs;

use Params\InputParameter;
use Params\ExtractRule\GetString;
use Params\ProcessRule\MinLength;
use Params\ProcessRule\MaxLength;
use Params\Create\CreateFromArray;
use Params\InputParameterList;

class ContentLinkLevel3 implements InputParameterList
{
    use CreateFromArray;

    private string $path;

    private string $description;

    /**
     *
     * @param string $path
     * @param string $description
     */
    public function __construct(
        string $path,
        string $description
    ) {
        $this->path = $path;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }


    /**
     * @return \Params\InputParameter[]
     */
    public static function getInputParameterList(): array
    {
        return [
            new InputParameter(
                'path',
                new GetString(),
                new MinLength(2),
                new MaxLength(1024)
            ),

            new InputParameter(
                'description',
                new GetString(),
                new MinLength(2),
                new MaxLength(1024)
            ),
        ];
    }
}
