@props(['val1', 'val2', 'symbol', 'result', 'error'])

<div class="result-container">
    <h1>計算結果</h1>
    <hr>
    {{-- エラーがある場合はエラーメッセージを表示 --}}
    @if ($error)
        <p style="color: red; font-weight: bold;">{{ $error }}</p>
    {{-- エラーがない場合は計算式と結果を表示 --}}
    @else
        <p style="font-size: 1.5rem; color: #555;">
            {{ $val1 }} {{ $symbol }} {{ $val2 }} =
        </p>
        <h2 style="font-size: 3rem; margin: 0; color: #333;">
            {{ $result }}
        </h2>
    @endif
</div>
