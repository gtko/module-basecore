<?php


namespace Modules\BaseCore\Icons;

use Illuminate\Support\Str;

/**
 * Class Icons
 * @link https://heroicons.dev/ list d'icon tailwind
 * @link https://css.gg/app list d'icon plus de 700
 * @method static home(int $size, string $class = '')
 * @method static folder(int $size, string $class = '')
 * @method static devis(int $size, string $class = '')
 * @method static document(int $size, string $class = '')
 * @method static busStop(int $size, string $class = '')
 * @method static trajet(int $size, string $class = '')
 * @method static note(int $size, string $class = '')
 * @method static task(int $size, string $class = '')
 * @method static download(int $size, string $class = '')
 * @method static delete(int $size, string $class = '')
 * @method static phone(int $size, string $class = '')
 * @method static print(int $size, string $class = '')
 * @method static email(int $size, string $class = '')
 * @method static calendar(int $size, string $class = '')
 * @method static search(int $size, string $class = '')
 * @method static spinner(int $size, string $class = '')
 * @method static empty(int $size, string $class = '')
 * @method static template(int $size, string $class = '')
 * @method static cuve(int $size, string $class = '')
 * @method static users(int $size, string $class = '')
 * @method static user(int $size, string $class = '')
 * @method static addCircle(int $size, string $class = '')
 * @method static tool(int $size, string $class = '')
 * @method static status(int $size, string $class = '')
 * @method static globe(int $size, string $class = '')
 * @method static briefcase(int $size, string $class = '')
 * @method static award(int $size, string $class = '')
 * @method static tag(int $size, string $class = '')
 * @method static lock(int $size, string $class = '')
 * @method static chevronDown(int $size, string $class = '')
 * @method static chevronRight(int $size, string $class = '')
 * @method static pause(int $size, string $class = '')
 * @method static play(int $size, string $class = '')
 * @method static stop(int $size, string $class = '')
 * @method static edit(int $size, string $class = '')
 * @method static data(int $size, string $class = '')
 * @method static category(int $size, string $class = '')
 * @method static cart(int $size, string $class = '')
 * @method static show(int $size, string $class = '')
 * @method static pdf(int $size, string $class = '')
 * @method static burger(int $size, string $class = '')
 * @method static bell(int $size, string $class = '')
 * @method static moon(int $size, string $class = '')
 * @method static logout(int $size, string $class = '')
 * @method static fingerprint(int $size, string $class = '')
 * @method static save(int $size, string $class = '')
 * @method static invoice(int $size, string $class = '')
 * @method static mail(int $size, string $class = '')
 * @method static creditCard(int $size, string $class = '')
 * @method static google(int $size, string $class = '')
 * @method static close(int $size, string $class = '')
 * @method static asc(int $size, string $class = '')
 * @method static desc(int $size, string $class = '')
 * @method static dot(int $size, string $class = '')
 * @method static check(int $size, string $class = '')
 * @method static stats(int $size, string $class = '')
 * @package App\Icons
 */
class Icons
{

    private array $icons = [
        'noIcon' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
        'home' => '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M21 8.77217L14.0208 1.79299C12.8492 0.621414 10.9497 0.621413 9.77817 1.79299L3 8.57116V23.0858H10V17.0858C10 15.9812 10.8954 15.0858 12 15.0858C13.1046 15.0858 14 15.9812 14 17.0858V23.0858H21V8.77217ZM11.1924 3.2072L5 9.39959V21.0858H8V17.0858C8 14.8767 9.79086 13.0858 12 13.0858C14.2091 13.0858 16 14.8767 16 17.0858V21.0858H19V9.6006L12.6066 3.2072C12.2161 2.81668 11.5829 2.81668 11.1924 3.2072Z" fill="currentColor" /></svg>',
        'folder' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>',
        'devis' => '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17 5H7V7H17V5Z" fill="currentColor" /><path d="M7 9H9V11H7V9Z" fill="currentColor" /><path d="M9 13H7V15H9V13Z" fill="currentColor" /><path d="M7 17H9V19H7V17Z" fill="currentColor" /><path d="M13 9H11V11H13V9Z" fill="currentColor" /><path d="M11 13H13V15H11V13Z" fill="currentColor" /><path d="M13 17H11V19H13V17Z" fill="currentColor" /><path d="M15 9H17V11H15V9Z" fill="currentColor" /><path d="M17 13H15V19H17V13Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M3 3C3 1.89543 3.89543 1 5 1H19C20.1046 1 21 1.89543 21 3V21C21 22.1046 20.1046 23 19 23H5C3.89543 23 3 22.1046 3 21V3ZM5 3H19V21H5V3Z" fill="currentColor" /></svg>',
        'document' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>',
        'busStop' => '<svg viewBox="0 0 512.04 512.04" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m473.21 0.021h-272.29c-22.457 1.146-39.78 20.202-38.787 42.667v349.87c0 0.128 0.067 0.234 0.073 0.36 0.028 0.964 0.22 1.917 0.569 2.816l0.053 0.18 0.014 0.048 20.196 46.408c2.47 5.928 8.221 9.825 14.642 9.921h7.121v34.133c0.029 2.914 0.561 5.801 1.573 8.533h-103.98v-153.6c-0.015-14.132-11.468-25.585-25.6-25.6v-145.66c35.76-4.505 61.856-36.034 59.599-72.006s-32.09-63.992-68.133-63.992-65.875 28.02-68.132 63.992 23.839 67.501 59.599 72.006v145.66c-14.132 0.015-25.585 11.468-25.6 25.6v153.6h-25.6c-4.713 0-8.533 3.82-8.533 8.533s3.82 8.533 8.533 8.533h494.93c4.713 0 8.533-3.821 8.533-8.533s-3.82-8.533-8.533-8.533h-35.706c1.012-2.733 1.544-5.62 1.572-8.533v-34.133h7.117c6.418-0.098 12.167-3.99 14.642-9.912l20.2-46.417 0.014-0.045c0.026-0.061 0.031-0.128 0.056-0.19 0.35-0.902 0.543-1.857 0.569-2.824 5e-3 -0.121 0.07-0.223 0.07-0.345v-349.87c0.992-22.466-16.333-41.522-38.792-42.667zm-456.14 102.4c0-28.277 22.923-51.2 51.2-51.2s51.2 22.923 51.2 51.2-22.923 51.2-51.2 51.2c-28.265-0.031-51.169-22.936-51.2-51.2zm68.266 392.53h-34.133v-153.6c6e-3 -4.71 3.823-8.527 8.533-8.533h17.067c4.71 6e-3 8.527 3.823 8.533 8.533v153.6zm170.67-8.534c-6e-3 4.71-3.823 8.527-8.533 8.533h-17.067c-4.71-6e-3 -8.527-3.823-8.533-8.533v-34.133h34.133v34.133zm15.494 8.534c1.012-2.733 1.544-5.62 1.572-8.533v-34.133h128v34.133c0.029 2.914 0.561 5.801 1.573 8.533h-131.14zm180.77-8.534c-5e-3 4.711-3.822 8.529-8.533 8.533h-17.067c-4.711-5e-3 -8.529-3.822-8.533-8.533v-34.133h34.133v34.133zm23.325-51.2h-277.05l-14.854-34.133h306.76l-14.859 34.133zm-176.92-51.2v-17.067c6e-3 -4.71 3.823-8.527 8.533-8.533h59.733c4.71 6e-3 8.527 3.823 8.533 8.533v17.067h-76.799zm196.27-341.33v341.33h-102.4v-17.067c-0.015-14.132-11.468-25.585-25.6-25.6h-59.733c-14.132 0.015-25.585 11.468-25.6 25.6v17.067h-102.4v-341.33c-0.965-13.033 8.705-24.43 21.721-25.6h272.29c13.017 1.17 22.689 12.566 21.725 25.6z"/><path d="m452.27 34.155h-230.4c-14.132 0.015-25.585 11.468-25.6 25.6v8.533c0.015 14.132 11.468 25.585 25.6 25.6h230.4c14.132-0.015 25.585-11.468 25.6-25.6v-8.533c-0.016-14.132-11.468-25.585-25.6-25.6zm8.533 34.133c-5e-3 4.711-3.823 8.529-8.533 8.533h-230.4c-4.71-6e-3 -8.527-3.823-8.533-8.533v-8.533c6e-3 -4.71 3.823-8.527 8.533-8.533h230.4c4.711 5e-3 8.529 3.822 8.533 8.533v8.533z"/><path d="m230.4 298.69c-18.851 0-34.133 15.282-34.133 34.133 0.022 18.842 15.291 34.112 34.133 34.133 18.851 0 34.133-15.282 34.133-34.133s-15.282-34.133-34.133-34.133zm0 51.2c-9.426 0-17.067-7.641-17.067-17.067 9e-3 -9.422 7.645-17.057 17.067-17.067 9.426 0 17.067 7.641 17.067 17.067s-7.641 17.067-17.067 17.067z"/><path d="m443.74 298.69c-18.851 0-34.133 15.282-34.133 34.133s15.282 34.133 34.133 34.133 34.133-15.282 34.133-34.133c-0.019-18.843-15.29-34.113-34.133-34.133zm0 51.2c-9.426 0-17.067-7.641-17.067-17.067s7.641-17.067 17.067-17.067 17.067 7.641 17.067 17.067c-0.011 9.421-7.645 17.056-17.067 17.067z"/><path d="m452.27 110.96h-230.4c-14.132 0.015-25.585 11.468-25.6 25.6v119.47c0.015 14.132 11.468 25.585 25.6 25.6h230.4c14.132-0.015 25.585-11.468 25.6-25.6v-119.47c-0.016-14.132-11.468-25.585-25.6-25.6zm8.533 145.07c-5e-3 4.711-3.823 8.529-8.533 8.533h-230.4c-4.71-6e-3 -8.527-3.823-8.533-8.533v-119.47c6e-3 -4.71 3.823-8.527 8.533-8.533h230.4c4.711 5e-3 8.529 3.822 8.533 8.533v119.47z"/></svg>',
        'trajet' => '<svg viewBox="0 0 512 512"  xmlns="http://www.w3.org/2000/svg"><g><path d="m94.744 296.184c-8.817 5.23-14.744 14.842-14.744 25.816 0 16.542 13.458 30 30 30 13.036 0 24.152-8.361 28.28-20h77.72c16.542 0 30 13.458 30 30s-13.458 30-30 30h-120c-27.57 0-50 22.43-50 50s22.43 50 50 50h100c5.523 0 10-4.477 10-10s-4.477-10-10-10h-100c-16.542 0-30-13.458-30-30s13.458-30 30-30h120c27.57 0 50-22.43 50-50s-22.43-50-50-50h-77.72c-2.365-6.668-7.023-12.257-13.024-15.816l76.378-125.316c12.015-18.06 18.366-39.104 18.366-60.868 0-60.654-49.346-110-110-110s-110 49.346-110 110c0 21.764 6.351 42.808 18.366 60.868zm15.256 35.816c-5.514 0-10-4.486-10-10s4.486-10 10-10 10 4.486 10 10-4.486 10-10 10zm0-312c49.626 0 90 40.374 90 90 0 17.868-5.227 35.135-15.115 49.935-.077.115-.152.232-.224.351l-74.661 122.499s-74.808-122.735-74.885-122.85c-9.888-14.8-15.115-32.067-15.115-49.935 0-49.626 40.374-90 90-90z"/><path d="m110 160c27.57 0 50-22.43 50-50s-22.43-50-50-50-50 22.43-50 50 22.43 50 50 50zm0-80c16.542 0 30 13.458 30 30s-13.458 30-30 30-30-13.458-30-30 13.458-30 30-30z"/><path d="m402 166c-60.654 0-110 49.346-110 110 0 21.799 6.371 42.875 18.424 60.954l76.093 119.36c-5.892 3.565-10.461 9.101-12.796 15.686h-87.721c-5.523 0-10 4.477-10 10s4.477 10 10 10h87.72c4.128 11.639 15.243 20 28.28 20 16.542 0 30-13.458 30-30 0-10.881-5.823-20.426-14.516-25.686l76.093-119.36c12.052-18.079 18.423-39.155 18.423-60.954 0-60.654-49.346-110-110-110zm0 326c-5.514 0-10-4.486-10-10s4.486-10 10-10 10 4.486 10 10-4.486 10-10 10zm74.885-166.065c-.039.06-74.885 117.462-74.885 117.462s-74.846-117.403-74.885-117.462c-9.888-14.8-15.115-32.067-15.115-49.935 0-49.626 40.374-90 90-90s90 40.374 90 90c0 17.868-5.227 35.135-15.115 49.935z"/><path d="m402 226c-27.57 0-50 22.43-50 50s22.43 50 50 50 50-22.43 50-50-22.43-50-50-50zm0 80c-16.542 0-30-13.458-30-30s13.458-30 30-30 30 13.458 30 30-13.458 30-30 30z"/><circle cx="241" cy="482" r="10"/></g></svg>',
        'note' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>',
        'task' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>',
        'download' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>',
        'delete' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>',
        'phone' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>',
        'print' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>',
        'email' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>',
        'calendar' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>',
        'search' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>',
        'spinner' => '<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" fill="currentColor"/></svg>',
        'empty' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"></path></svg>',
        'template' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path></svg>',
        'cuve' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>',
        'users' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>',
        'user' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>',
        'addCircle' => '<svg  fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
        'tool' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>',
        'status' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.636 18.364a9 9 0 010-12.728m12.728 0a9 9 0 010 12.728m-9.9-2.829a5 5 0 010-7.07m7.072 0a5 5 0 010 7.07M13 12a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>',
        'globe' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
        'briefcase' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>',
        'award' => '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M19 9C19 11.3787 17.8135 13.4804 16 14.7453V22H13.4142L12 20.5858L10.5858 22H8V14.7453C6.18652 13.4804 5 11.3787 5 9C5 5.13401 8.13401 2 12 2C15.866 2 19 5.13401 19 9ZM17 9C17 11.7614 14.7614 14 12 14C9.23858 14 7 11.7614 7 9C7 6.23858 9.23858 4 12 4C14.7614 4 17 6.23858 17 9ZM10 19.7573L12 17.7573L14 19.7574V15.7101C13.3663 15.8987 12.695 16 12 16C11.305 16 10.6337 15.8987 10 15.7101V19.7573Z" fill="currentColor" /></svg>',
        'tag' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>',
        'lock' => '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M18 10.5C19.6569 10.5 21 11.8431 21 13.5V19.5C21 21.1569 19.6569 22.5 18 22.5H6C4.34315 22.5 3 21.1569 3 19.5V13.5C3 11.8431 4.34315 10.5 6 10.5V7.5C6 4.18629 8.68629 1.5 12 1.5C15.3137 1.5 18 4.18629 18 7.5V10.5ZM12 3.5C14.2091 3.5 16 5.29086 16 7.5V10.5H8V7.5C8 5.29086 9.79086 3.5 12 3.5ZM18 12.5H6C5.44772 12.5 5 12.9477 5 13.5V19.5C5 20.0523 5.44772 20.5 6 20.5H18C18.5523 20.5 19 20.0523 19 19.5V13.5C19 12.9477 18.5523 12.5 18 12.5Z" fill="currentColor" /></svg>',
        'chevronDown' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>',
        'chevronRight' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>',
        'stop' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z"></path></svg>',
        'play' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
        'pause' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
        'edit' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>',
        'data' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>',
        'category' => '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M2 8V16C2 16.5523 2.44772 17 3 17H16.6202C16.9121 17 17.1895 16.8724 17.3795 16.6508L20.808 12.6508C21.129 12.2763 21.129 11.7237 20.808 11.3492L17.3795 7.34921C17.1895 7.12756 16.9121 7 16.6202 7H3C2.44772 7 2 7.44772 2 8ZM0 8V16C0 17.6569 1.34315 19 3 19H16.6202C17.496 19 18.328 18.6173 18.898 17.9524L22.3265 13.9524C23.2895 12.8289 23.2895 11.1711 22.3265 10.0476L18.898 6.04763C18.328 5.38269 17.496 5 16.6202 5H3C1.34315 5 0 6.34315 0 8Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M15 13C15.5523 13 16 12.5523 16 12C16 11.4477 15.5523 11 15 11C14.4477 11 14 11.4477 14 12C14 12.5523 14.4477 13 15 13ZM15 15C16.6569 15 18 13.6569 18 12C18 10.3431 16.6569 9 15 9C13.3431 9 12 10.3431 12 12C12 13.6569 13.3431 15 15 15Z" fill="currentColor" /></svg>',
        'cart' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>',
        'show' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>',
        'pdf' => '<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g><path d="m127.741 209h-31.741c-3.986 0-7.809 1.587-10.624 4.41s-4.389 6.651-4.376 10.638l.221 113.945c0 8.284 6.716 15 15 15s15-6.716 15-15v-34.597c6.133-.031 12.685-.058 16.52-.058 26.356 0 47.799-21.16 47.799-47.169s-21.443-47.169-47.799-47.169zm0 64.338c-3.869 0-10.445.027-16.602.059-.032-6.386-.06-13.263-.06-17.228 0-3.393-.017-10.494-.035-17.169h16.696c9.648 0 17.799 7.862 17.799 17.169s-8.15 17.169-17.798 17.169z"/><path d="m255.33 209h-31.33c-3.983 0-7.803 1.584-10.617 4.403s-4.391 6.642-4.383 10.625c0 .001.223 110.246.224 110.646.015 3.979 1.609 7.789 4.433 10.592 2.811 2.79 6.609 4.354 10.567 4.354h.057c.947-.004 23.294-.089 32.228-.245 33.894-.592 58.494-30.059 58.494-70.065-.001-42.054-23.981-70.31-59.673-70.31zm.655 110.38c-3.885.068-10.569.123-16.811.163-.042-13.029-.124-67.003-.147-80.543h16.303c27.533 0 29.672 30.854 29.672 40.311 0 19.692-8.972 39.719-29.017 40.069z"/><path d="m413.863 237.842c8.284 0 15-6.716 15-15s-6.716-15-15-15h-45.863c-8.284 0-15 6.716-15 15v113.158c0 8.284 6.716 15 15 15s15-6.716 15-15v-42.65h27.22c8.284 0 15-6.716 15-15s-6.716-15-15-15h-27.22v-25.508z"/><path d="m458 145h-11v-4.279c0-19.282-7.306-37.607-20.572-51.601l-62.305-65.721c-14.098-14.87-33.936-23.399-54.428-23.399h-199.695c-24.813 0-45 20.187-45 45v100h-11c-24.813 0-45 20.187-45 45v180c0 24.813 20.187 45 45 45h11v52c0 24.813 20.187 45 45 45h292c24.813 0 45-20.187 45-45v-52h11c24.813 0 45-20.187 45-45v-180c0-24.813-20.187-45-45-45zm-363-100c0-8.271 6.729-15 15-15h199.695c12.295 0 24.198 5.117 32.657 14.04l62.305 65.721c7.96 8.396 12.343 19.391 12.343 30.96v4.279h-322zm322 422c0 8.271-6.729 15-15 15h-292c-8.271 0-15-6.729-15-15v-52h322zm56-97c0 8.271-6.729 15-15 15h-404c-8.271 0-15-6.729-15-15v-180c0-8.271 6.729-15 15-15h404c8.271 0 15 6.729 15 15z"/></g></svg>',
        'burger' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"></path></svg>',
        'bell' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>',
        'moon' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>',
        'logout' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>',
        'fingerprint' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"></path></svg>',
        'save' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>',
        'invoice' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z"></path></svg>',
        'mail' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>',
        'creditCard' => '<svg  fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" /></svg>',
        'google' => '<svg  fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M6 12C6 15.3137 8.68629 18 12 18C14.6124 18 16.8349 16.3304 17.6586 14H12V10H21.8047V14H21.8C20.8734 18.5645 16.8379 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C15.445 2 18.4831 3.742 20.2815 6.39318L17.0039 8.68815C15.9296 7.06812 14.0895 6 12 6C8.68629 6 6 8.68629 6 12Z" fill="currentColor"/></svg>',
        'close' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>',
        'desc' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4" /></svg>',
        'asc' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" /></svg>',
        'dot' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" /></svg>',
        'stats' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>',

    ];

    public function getAll(): array
    {
        return $this->icons;
    }

    private function getIcons($name, int $size = 24, string $class = '')
    {
        $svg = $this->icons[$name];

        $renderSize = '';
        $renderClass = '';

        if ($size) {
            $renderSize = "with='$size' height='$size'";
        }

        if (!empty($class)) {
            $renderClass = "class='$class'";
        }

        return Str::replace('<svg', "<svg $renderSize $renderClass ", $svg);
    }

    public function __call($method, $arguments): mixed
    {
        $key = Str::camel($method);
        $size = $arguments[0] ?? 24;
        $class = $arguments[1] ?? '';

        if (!array_key_exists($key, $this->icons)) {
            $key = 'noIcon';
        }

        return $this->getIcons($key, $size, $class);
    }

    public static function __callStatic($method, $arguments)
    {
        return (new self())->{$method}(...$arguments);
    }
}
