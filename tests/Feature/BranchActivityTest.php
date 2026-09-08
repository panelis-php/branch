<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Panelis\Branch\Models\Branch;
use Spatie\Activitylog\Models\Activity;

uses(RefreshDatabase::class);

it('logs branch lifecycle activity', function (): void {
    $branch = Branch::query()->create([
        'user_id' => 1,
        'slug' => 'main-branch',
        'name' => 'Main branch',
    ]);

    $activity = Activity::query()->where('subject_id', $branch->getKey())->firstOrFail();

    expect($activity->log_name)->toBe('branch')
        ->and($activity->event)->toBe('created')
        ->and($activity->description)->toBe('branch::activity.created');
});

it('does not log branch activity when activity logging is disabled', function (): void {
    config()->set('activitylog.enabled', false);

    Branch::query()->create([
        'user_id' => 1,
        'slug' => 'main-branch',
        'name' => 'Main branch',
    ]);

    expect(Activity::query()->count())->toBe(0);
});
