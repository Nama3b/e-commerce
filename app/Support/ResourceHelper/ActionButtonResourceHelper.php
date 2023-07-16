<?php

namespace App\Support\ResourceHelper;

trait ActionButtonResourceHelper
{
    /**
     * @param $data
     * @return string
     */
    private function editAction($data): string
    {
        return '<a href="javascript:void(0);" class="btn btn-light btn-xs d-inline-flex py-1 mx-1 inline_edit" data-id="' . $data . '">'
            . '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">'
            . '<path stroke="#29B0FF" stroke-linecap="round" stroke-linejoin="round" d="M9.13306 13.2654H13.3844" />'
            . '<path stroke="#29B0FF" stroke-linecap="round" stroke-linejoin="round" d="M8.57 3.30378C9.06131 2.67778 9.85531 2.71044 10.482 3.20178L11.4086 3.92844C12.0353 4.41978 12.2573 5.18178 11.766 5.80911L6.23997 12.8591C6.05531 13.0951 5.77331 13.2344 5.47331 13.2378L3.34197 13.2651L2.85931 11.1884C2.79131 10.8971 2.85931 10.5904 3.04397 10.3538L8.57 3.30378Z" />'
            . '<path stroke="#29B0FF" stroke-linecap="round" stroke-linejoin="round" d="M7.53516 4.62402L10.7312 7.12936" />'
            . '</svg>'
            . '</a>';
    }

    /**
     * @param $data
     * @return string
     */
    private function deleteAction($data): string
    {
        return '<a href="javascript:void(0);" class="btn btn-light btn-xs d-inline-flex py-1 mx-1 inline_delete" data-id="' . $data . '" >'
            . '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">'
            . '<path stroke="#E26258" stroke-linecap="round" stroke-linejoin="round" d="M12.8833 6.31213C12.8833 6.31213 12.5213 10.8021 12.3113 12.6935C12.2113 13.5968 11.6533 14.1261 10.7393 14.1428C8.99994 14.1741 7.25861 14.1761 5.51994 14.1395C4.64061 14.1215 4.09194 13.5855 3.99394 12.6981C3.78261 10.7901 3.42261 6.31213 3.42261 6.31213" />'
            . '<path stroke="#E26258" stroke-linecap="round" stroke-linejoin="round" d="M13.8056 4.15981H2.50024" />'
            . '<path stroke="#E26258" stroke-linecap="round" stroke-linejoin="round" d="M11.6271 4.1598C11.1038 4.1598 10.6531 3.7898 10.5505 3.27713L10.3885 2.46647C10.2885 2.09247 9.9498 1.8338 9.5638 1.8338H6.7418C6.3558 1.8338 6.01713 2.09247 5.91713 2.46647L5.75513 3.27713C5.65247 3.7898 5.2018 4.1598 4.67847 4.1598" />'
            . '</svg>'
            . '</a>';
    }
}
