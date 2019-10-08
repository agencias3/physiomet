@if (isset($actionText))
    <table style="{{ $style['body_sub'] }}">
        <tr>
            <td style="{{ $fontFamily }}">
                <p style="{{ $style['paragraph-sub_2'] }}">
                    Se você tiver problemas ao clicar no botão "{{ $actionText }}", copie e cole o URL abaixo em seu navegador da Web:
                </p>

                <p style="{{ $style['paragraph-sub_2'] }}">
                    <a style="{{ $style['anchor_2'] }}" href="{{ $actionUrl }}" target="_blank">
                        {{ $actionUrl }}
                    </a>
                </p>
            </td>
        </tr>
    </table>
@endif