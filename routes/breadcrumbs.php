<?php       
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
 
Breadcrumbs::for('listUser', function (BreadcrumbTrail $trail): void {
    $trail->push('Dashboard> Master Data > List User', route('listUser'));
});
Breadcrumbs::for('materi', function (BreadcrumbTrail $trail): void {
    $trail->push('Dashboard> Master Data > List materi', route('materi'));
});
Breadcrumbs::for('holding', function (BreadcrumbTrail $trail): void {
    $trail->push('Dashboard> Master Data > List holding', route('holding'));
});
Breadcrumbs::for('agency', function (BreadcrumbTrail $trail): void {
    $trail->push('Dashboard> Master Data > List agency', route('agency'));
});
Breadcrumbs::for('advertiser', function (BreadcrumbTrail $trail): void {
    $trail->push('Dashboard> Master Data > List advertiser', route('advertiser'));
});
Breadcrumbs::for('brand', function (BreadcrumbTrail $trail): void {
    $trail->push('Dashboard> Master Data > List brand', route('brand'));
});
Breadcrumbs::for('flagrate', function (BreadcrumbTrail $trail): void {
    $trail->push('Dashboard> Master Data > List flagrate', route('flagrate'));
});
Breadcrumbs::for('spottype', function (BreadcrumbTrail $trail): void {
    $trail->push('Dashboard> Master Data > List spottype', route('spottype'));
});
Breadcrumbs::for('channel', function (BreadcrumbTrail $trail): void {
    $trail->push('Dashboard> Master Data > List channel', route('channel'));
});
Breadcrumbs::for('category', function (BreadcrumbTrail $trail): void {
    $trail->push('Dashboard> Master Data > List category', route('category'));
});
Breadcrumbs::for('settings', function (BreadcrumbTrail $trail): void {
    $trail->push('Dashboard> Master Data > List settings', route('settings'));
});
 
// Breadcrumbs::for('users.show', function (BreadcrumbTrail $trail, User $user): void {
//     $trail->parent('users.index');
 
//     $trail->push($user->name, route('users.show', $user));
// });
 
// Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail, User $user): void {
//     $trail->parent('users.show');
 
//     $trail->push('Edit', route('users.edit', $user));
// });

?>