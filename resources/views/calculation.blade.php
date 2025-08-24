{{-- ステップ2で作成した共通レイアウトを読み込む --}}
<x-layouts.app>

    {{-- ステップ3で作成したcalcコンポーネントを呼び出す --}}
    {{-- ルーティングから渡された変数を `:` を使ってコンポーネントに渡す --}}
    <x-calc 
        :val1="$val1" 
        :val2="$val2" 
        :symbol="$symbol" 
        :result="$result" 
        :error="$error" 
    />

</x-layouts.app>
