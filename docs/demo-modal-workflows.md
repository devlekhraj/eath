# Demo Modal Workflows

Use the existing helpers consistently when opening dynamic demo content.

## `openModal()`

Use `openModal()` for centered dialogs such as departure planning and confirmation flows.

### Trigger

Add `data-open-modal` to the trigger element. The `href` must point to a route that returns the modal partial.

```blade
<a href="{{ route('demo.departures.wizard', ['departure_id' => $departure['id']]) }}"
   class="demo-btn demo-btn--primary"
   data-open-modal
   data-modal-size="modal-lg">
    Plan This Date
</a>
```

### Route

The route must validate the requested resource and return the dedicated Blade partial.

```php
Route::get('/departures/{departure_id}/wizard', function (string $departure_id) {
    $departure = DemoCatalogRepository::findDeparture($departure_id);

    abort_if(!$departure, 404);

    return view('demo.components.departure-wizard-modal', [
        'departure' => $departure,
    ]);
})->name('departures.wizard');
```

### Partial rules

- Return modal content only; do not add another global modal shell.
- Use `data-bs-dismiss="modal"` on modal close controls.
- Keep the partial self-contained and render all required departure context.
- Do not use `openRightPanel()` for centered departure dialogs.

## `openRightPanel()`

Use `openRightPanel()` for forms and contextual content that should slide in from the right.

### Trigger

Add `data-open-panel` to the trigger. The `href` must point to the dedicated panel route.

```blade
<a href="{{ route('demo.planner.form', [
        'mode' => 'custom',
        'trek' => $trek['id'],
        'source' => 'detail',
    ]) }}"
   class="demo-btn demo-btn--outline"
   data-open-panel
   data-panel-size="450px"
   data-panel-title="Customize your route">
    Customize Route
</a>
```

### Route

Return a dedicated panel form Blade file with the context needed to render it.

```php
Route::get('/plan-my-trek/form', function (Request $request) {
    return view('demo.pages.planner.plan-trip-form', [
        'context' => DemoPlannerDraftService::validateEntryContext($request->all()),
        'existingDraft' => DemoPlannerDraftService::getDraft(),
    ]);
})->name('planner.form');
```

### Partial rules

- The form belongs in `resources/views/demo/pages/planner/plan-trip-form.blade.php`.
- Return form content only; do not include the global offcanvas shell or duplicate its header.
- The shared shell is included by the demo layout through `demo.components.global-offcanvas`.
- The shell header stays fixed while the form body scrolls.
- Only the header close button closes the panel. Backdrop clicks and Escape remain disabled.
- Use sharp corners and the E.A.T.H. brand color tokens.

## Choosing the helper

| Requirement | Helper | Trigger | Returned view |
|---|---|---|---|
| Centered departure dialog | `openModal()` | `data-open-modal` | Modal partial |
| Right-side planner form | `openRightPanel()` | `data-open-panel` | Dedicated panel form |

Always verify that the trigger route, returned Blade view, and helper match. Do not point a panel trigger at `demo.planner.start` when a dedicated panel form route is required.
