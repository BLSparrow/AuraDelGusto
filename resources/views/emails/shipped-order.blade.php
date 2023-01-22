<!--[if (gte mso 9)|(IE)]>
<table width="600" align="center">
    <tr>
        <td style="padding-top:0; padding-bottom:0; padding-right:0; padding-left:0; margin:0px;">
<![endif]-->
<table align="center" cellspacing="0" cellpadding="0" border="0" style="width:100%; max-width:600px; border:0;">
    <tr>
        <td style="padding-top:20px;padding-bottom:20px;padding-right:30px;padding-left:30px;text-align:center;font-family: Arial, Helvetica, sans-serif;font-size:24px; line-height:32px; color:#222222;">
            Информация о заказе <br> {{date('d.m.Y H:i', strtotime($order->created_at))}}
        </td>
    </tr>
    <tr>
        <td style="padding-bottom:20px;"><img src="{{asset('storage/img/img_for_home.png')}}" width="600"
                                              alt="AuraDelGusto"
                                              style="width:100%;max-width:600px;height:auto;"></td>
    </tr>
    <tr>
        <td style="padding-top:0px;padding-bottom:20px;padding-right:0;padding-left:0;text-align:center;">
            <!--[if (gte mso 9)|(IE)]>
            <table width="100%">
                <tr>
                    <td width="50%" valign="top">
            <![endif]-->
            <div class="column" style="width:100%;max-width:290px;display:inline-block;vertical-align:top;">
                <table width="100%" cellpadding="0" cellspacing="0" style="border-spacing:0;">
                    <tr>
                        <td align="center"
                            style="padding-top:10px;padding-bottom:5px;padding-right:5px;padding-left:5px;text-align:center;font-family: Arial, Helvetica, sans-serif;font-size:15px; line-height:18px; color:#222222;">
                            Здраствуйте, <i>{{$order->user->name}}!</i> <br> Статус заказа
                            <b>{{$order->status->name}}</b><br>
                            @if($order->reason)
                                Причина отмены: <p><b>{{$order->reason}}</b></p>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            <td width="50%" valign="top">
            <![endif]-->
            <div class="column" style="width:100%;max-width:290px;display:inline-block;vertical-align:top;">
                <table width="100%" cellpadding="0" cellspacing="0" style="border-spacing:0;">
                    <tr>
                        <td align="center"
                            style="padding-top:10px;padding-bottom:5px;padding-right:5px;padding-left:5px;text-align:center;font-family: Arial, Helvetica, sans-serif;font-size:15px; line-height:18px; color:#222222;">
                            <b>Ваш заказ</b><br>
                            <ul style="text-align: left">
                                @foreach($order->items as $product)
                                    <li style="list-style-type: none">
                                        {{$product->menu->name}} ({{$product->count}})
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td align="center"
                            style="padding-top:10px;padding-bottom:5px;padding-right:5px;padding-left:5px;text-align:center;font-family: Arial, Helvetica, sans-serif;font-size:15px; line-height:18px; color:#222222;">
                            <ul style="text-align: left">
                                @foreach($order->items as $product)
                                    <li style="list-style-type: none">
                                        {{$product->count*$product->menu->price}} &#8381;
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                </table>
            </div>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            <td width="50%" valign="top">
            <![endif]-->
            <div class="column" style="width:100%;max-width:290px;display:inline-block;vertical-align:top;">
                <table width="100%" cellpadding="0" cellspacing="0" style="border-spacing:0;">
                    <tr>
                        <td align="center"
                            style="padding-top:10px;padding-bottom:5px;padding-right:5px;padding-left:5px;text-align:center;font-family: Arial, Helvetica, sans-serif;font-size:15px; line-height:18px; color:#222222;">
                            К оплате <b>{{$order->amount}} &#8381;</b>
                        </td>
                    </tr>
                </table>
            </div>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            <td width="50%" valign="top">
            <![endif]-->
            <div class="column" style="width:100%;max-width:290px;display:inline-block;vertical-align:top;">
                <table width="100%" cellpadding="0" cellspacing="0" style="border-spacing:0;">
                    <tr>
                        <td align="center"
                            style="padding-top:10px;padding-bottom:5px;padding-right:5px;padding-left:5px;text-align:center;font-family: Arial, Helvetica, sans-serif;font-size:15px; line-height:18px; color:#222222;">
                            Спасибо, что выбрали нас <br/>
                            <i>AuraDelGusto</i>
                        </td>
                    </tr>
                </table>
            </div>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
</table>
<!--[if (gte mso 9)|(IE)]>
