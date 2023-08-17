@props(['class', 'as' => 'button'])
<{{$as}}
    {{$attributes->class([
        "inline-flex items-center justify-center px-10 py-2 border-2 border-transparent rounded-lg text-sm uppercase font-bold leading-5 text-white bg-green-400 hover:bg-transparent hover:text-green-400 hover:border-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400 disabled:bg-gray-300 disabled:pointer-events-none",
        $class ?? '',
    ])}}
>
    {{$slot}}
</{{$as}}>
