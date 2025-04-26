<?php

use Illuminate\Support\Collection;
use App\Macros\Collection\ToAssocArrayMacro;
use App\Macros\Collection\GroupByFirstLetterMacro;
use App\Macros\Collection\ChunkByConditionMacro;
use App\Macros\Collection\RandomGroupsMacro;

/*
|--------------------------------------------------------------------------
| Collection Macros Loader
|--------------------------------------------------------------------------
|
| This file registers custom Collection macros.
| Simply require this file from your AppServiceProvider
| or from a custom MacroServiceProvider.
|
*/

Collection::macro('toAssocArray', app(ToAssocArrayMacro::class));
Collection::macro('groupByFirstLetter', app(GroupByFirstLetterMacro::class));
Collection::macro('chunkByCondition', app(ChunkByConditionMacro::class));
Collection::macro('randomGroups', app(RandomGroupsMacro::class));
