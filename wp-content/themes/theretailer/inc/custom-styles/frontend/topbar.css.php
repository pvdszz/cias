<?php

$custom_style .= '

    .gbtr_tools_wrapper
    {
        background: ' . GBT_Opt::getOption( 'topbar_bg_color', '#000' )  . ';
    }

    .gbtr_tools_wrapper,
    .gbtr_tools_account ul li a,
    .logout_link,
    .gbtr_tools_search_inputbutton,
    .top-bar-menu-trigger,
    .gbtr_tools_search_trigger,
    .gbtr_tools_search_trigger_mobile
    {
        color: ' . GBT_Opt::getOption( 'topbar_color', '#fff' )  . ';
    }

    .gbtr_tools_wrapper .tr_social_icons_list .tr_social_icon a svg
    {
        fill: ' . GBT_Opt::getOption( 'topbar_color', '#fff' )  . '!important;
    }

    .gbtr_tools_info,
    .gbtr_tools_account
    {
        font-size: ' . GBT_Opt::getOption( 'top_bar_font_size', 10 )  . 'px;
    }
';

?>
