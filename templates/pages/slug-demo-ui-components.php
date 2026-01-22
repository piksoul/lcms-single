<?php
/**
 * DaisyUI Components Demo - UI Elements
 *
 * Showcases buttons, badges, cards, alerts, modals, and more.
 * Create page with slug "demo-ui-components" and select "LeanCMS Full Page" template.
 *
 * @filepath templates/pages/slug-demo-ui-components.php
 */

get_header();
?>

<link rel="stylesheet" href="<?php echo LEANCMS_PLUGIN_URL; ?>templates/assets/tailwind/tailwind.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<div data-theme="lcms">

<!-- Hero -->
<section class="hero bg-base-200 py-16">
    <div class="hero-content text-center">
        <div class="max-w-2xl">
            <div class="badge badge-primary badge-lg mb-4">DaisyUI Showcase</div>
            <h1 class="text-5xl font-bold">UI Components</h1>
            <p class="py-6 opacity-70">Buttons, badges, cards, alerts, modals, and more.</p>
        </div>
    </div>
</section>

<!-- Buttons Section -->
<section class="lcms-section bg-base-100">
    <div class="lcms-container">
        <h2 class="text-3xl font-bold mb-8">Buttons</h2>

        <div class="mb-8">
            <h3 class="text-xl font-semibold mb-4">Button Variants</h3>
            <div class="flex flex-wrap gap-4">
                <button class="btn">Default</button>
                <button class="btn btn-primary">Primary</button>
                <button class="btn btn-secondary">Secondary</button>
                <button class="btn btn-accent">Accent</button>
                <button class="btn btn-ghost">Ghost</button>
                <button class="btn btn-link">Link</button>
            </div>
        </div>

        <div class="mb-8">
            <h3 class="text-xl font-semibold mb-4">Button States</h3>
            <div class="flex flex-wrap gap-4">
                <button class="btn btn-info">Info</button>
                <button class="btn btn-success">Success</button>
                <button class="btn btn-warning">Warning</button>
                <button class="btn btn-error">Error</button>
            </div>
        </div>

        <div class="mb-8">
            <h3 class="text-xl font-semibold mb-4">Button Sizes</h3>
            <div class="flex flex-wrap items-center gap-4">
                <button class="btn btn-xs">Tiny</button>
                <button class="btn btn-sm">Small</button>
                <button class="btn">Normal</button>
                <button class="btn btn-lg">Large</button>
            </div>
        </div>

        <div class="mb-8">
            <h3 class="text-xl font-semibold mb-4">Button Styles</h3>
            <div class="flex flex-wrap gap-4">
                <button class="btn btn-outline btn-primary">Outline</button>
                <button class="btn btn-primary btn-wide">Wide</button>
                <button class="btn btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
                <button class="btn btn-square">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                </button>
                <button class="btn btn-primary loading">Loading</button>
            </div>
        </div>
    </div>
</section>

<!-- Badges Section -->
<section class="lcms-section bg-base-200">
    <div class="lcms-container">
        <h2 class="text-3xl font-bold mb-8">Badges</h2>

        <div class="mb-8">
            <h3 class="text-xl font-semibold mb-4">Badge Variants</h3>
            <div class="flex flex-wrap gap-4">
                <span class="badge">default</span>
                <span class="badge badge-primary">primary</span>
                <span class="badge badge-secondary">secondary</span>
                <span class="badge badge-accent">accent</span>
                <span class="badge badge-ghost">ghost</span>
            </div>
        </div>

        <div class="mb-8">
            <h3 class="text-xl font-semibold mb-4">Badge States</h3>
            <div class="flex flex-wrap gap-4">
                <span class="badge badge-info">info</span>
                <span class="badge badge-success">success</span>
                <span class="badge badge-warning">warning</span>
                <span class="badge badge-error">error</span>
            </div>
        </div>

        <div class="mb-8">
            <h3 class="text-xl font-semibold mb-4">Badge Sizes</h3>
            <div class="flex flex-wrap items-center gap-4">
                <span class="badge badge-xs badge-primary">xs</span>
                <span class="badge badge-sm badge-primary">sm</span>
                <span class="badge badge-md badge-primary">md</span>
                <span class="badge badge-lg badge-primary">lg</span>
            </div>
        </div>

        <div>
            <h3 class="text-xl font-semibold mb-4">Outline Badges</h3>
            <div class="flex flex-wrap gap-4">
                <span class="badge badge-outline">outline</span>
                <span class="badge badge-outline badge-primary">primary</span>
                <span class="badge badge-outline badge-secondary">secondary</span>
                <span class="badge badge-outline badge-accent">accent</span>
            </div>
        </div>
    </div>
</section>

<!-- Cards Section -->
<section class="lcms-section bg-base-100">
    <div class="lcms-container">
        <h2 class="text-3xl font-bold mb-8">Cards</h2>

        <div class="grid md:grid-cols-3 gap-6">
            <!-- Basic Card -->
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Basic Card</h2>
                    <p>A simple card with just text content and a button.</p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Action</button>
                    </div>
                </div>
            </div>

            <!-- Card with Image -->
            <div class="card bg-base-100 shadow-xl">
                <figure class="bg-primary h-48 flex items-center justify-center">
                    <span class="text-6xl">🎨</span>
                </figure>
                <div class="card-body">
                    <h2 class="card-title">Card with Image</h2>
                    <p>Cards can have images at the top.</p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary btn-sm">View</button>
                    </div>
                </div>
            </div>

            <!-- Card with Badge -->
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">
                        Card with Badge
                        <span class="badge badge-secondary">NEW</span>
                    </h2>
                    <p>Combine cards with badges for status indicators.</p>
                    <div class="card-actions justify-end">
                        <span class="badge badge-outline">Featured</span>
                        <span class="badge badge-outline">Design</span>
                    </div>
                </div>
            </div>

            <!-- Compact Card -->
            <div class="card card-compact bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title text-sm">Compact Card</h2>
                    <p class="text-xs">Less padding for denser layouts.</p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary btn-xs">Tiny</button>
                    </div>
                </div>
            </div>

            <!-- Card with Side Image -->
            <div class="card card-side bg-base-100 shadow-xl md:col-span-2">
                <figure class="bg-secondary w-32 flex items-center justify-center">
                    <span class="text-4xl">📚</span>
                </figure>
                <div class="card-body">
                    <h2 class="card-title">Side Image Card</h2>
                    <p>Great for horizontal layouts like file previews or list items.</p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary btn-sm">Details</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Alerts Section -->
<section class="lcms-section bg-base-200">
    <div class="lcms-container">
        <h2 class="text-3xl font-bold mb-8">Alerts</h2>

        <div class="space-y-4">
            <div role="alert" class="alert">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>Default alert - neutral information message.</span>
            </div>

            <div role="alert" class="alert alert-info">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>Info alert - helpful information for the user.</span>
            </div>

            <div role="alert" class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>Success alert - operation completed successfully!</span>
            </div>

            <div role="alert" class="alert alert-warning">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                <span>Warning alert - something requires attention.</span>
            </div>

            <div role="alert" class="alert alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>Error alert - something went wrong!</span>
            </div>

            <div role="alert" class="alert shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <div>
                    <h3 class="font-bold">Alert with actions!</h3>
                    <div class="text-xs">You have 3 unread messages</div>
                </div>
                <button class="btn btn-sm">See</button>
                <button class="btn btn-sm btn-primary">Mark as read</button>
            </div>
        </div>
    </div>
</section>

<!-- Modals Section -->
<section class="lcms-section bg-base-100">
    <div class="lcms-container">
        <h2 class="text-3xl font-bold mb-8">Modals</h2>

        <div class="flex flex-wrap gap-4">
            <!-- Basic Modal -->
            <button class="btn btn-primary" onclick="modal_basic.showModal()">Basic Modal</button>
            <dialog id="modal_basic" class="modal">
                <div class="modal-box">
                    <h3 class="font-bold text-lg">Hello!</h3>
                    <p class="py-4">This is a basic modal dialog. Press ESC or click outside to close.</p>
                    <div class="modal-action">
                        <form method="dialog">
                            <button class="btn">Close</button>
                        </form>
                    </div>
                </div>
                <form method="dialog" class="modal-backdrop">
                    <button>close</button>
                </form>
            </dialog>

            <!-- Modal with Form -->
            <button class="btn btn-secondary" onclick="modal_form.showModal()">Modal with Form</button>
            <dialog id="modal_form" class="modal">
                <div class="modal-box">
                    <h3 class="font-bold text-lg">Subscribe to Newsletter</h3>
                    <div class="form-control mt-4">
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email" placeholder="your@email.com" class="input input-bordered" />
                    </div>
                    <div class="modal-action">
                        <form method="dialog">
                            <button class="btn btn-ghost">Cancel</button>
                            <button class="btn btn-primary">Subscribe</button>
                        </form>
                    </div>
                </div>
            </dialog>

            <!-- Confirmation Modal -->
            <button class="btn btn-error" onclick="modal_confirm.showModal()">Confirmation</button>
            <dialog id="modal_confirm" class="modal">
                <div class="modal-box">
                    <h3 class="font-bold text-lg text-error">Are you sure?</h3>
                    <p class="py-4">This action cannot be undone. Do you want to proceed?</p>
                    <div class="modal-action">
                        <form method="dialog">
                            <button class="btn btn-ghost">Cancel</button>
                            <button class="btn btn-error">Delete</button>
                        </form>
                    </div>
                </div>
            </dialog>
        </div>
    </div>
</section>

<!-- Tooltips & Dropdowns -->
<section class="lcms-section bg-base-200">
    <div class="lcms-container">
        <h2 class="text-3xl font-bold mb-8">Tooltips & Dropdowns</h2>

        <div class="mb-8">
            <h3 class="text-xl font-semibold mb-4">Tooltips</h3>
            <div class="flex flex-wrap gap-4">
                <div class="tooltip" data-tip="Hello!">
                    <button class="btn">Hover me</button>
                </div>
                <div class="tooltip tooltip-primary" data-tip="Primary tooltip">
                    <button class="btn btn-primary">Primary</button>
                </div>
                <div class="tooltip tooltip-secondary" data-tip="Secondary tooltip">
                    <button class="btn btn-secondary">Secondary</button>
                </div>
                <div class="tooltip tooltip-open tooltip-accent" data-tip="Always visible">
                    <button class="btn btn-accent">Open</button>
                </div>
            </div>
        </div>

        <div>
            <h3 class="text-xl font-semibold mb-4">Dropdowns</h3>
            <div class="flex flex-wrap gap-4">
                <div class="dropdown">
                    <div tabindex="0" role="button" class="btn m-1">Click Dropdown</div>
                    <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a>Item 1</a></li>
                        <li><a>Item 2</a></li>
                        <li><a>Item 3</a></li>
                    </ul>
                </div>

                <div class="dropdown dropdown-hover">
                    <div tabindex="0" role="button" class="btn m-1">Hover Dropdown</div>
                    <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a>Option A</a></li>
                        <li><a>Option B</a></li>
                        <li><a>Option C</a></li>
                    </ul>
                </div>

                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn m-1">End Aligned</div>
                    <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a>Settings</a></li>
                        <li><a>Profile</a></li>
                        <li><a>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Loading & Progress -->
<section class="lcms-section bg-base-100">
    <div class="lcms-container">
        <h2 class="text-3xl font-bold mb-8">Loading & Progress</h2>

        <div class="mb-8">
            <h3 class="text-xl font-semibold mb-4">Loading Spinners</h3>
            <div class="flex flex-wrap items-center gap-8">
                <span class="loading loading-spinner loading-xs"></span>
                <span class="loading loading-spinner loading-sm"></span>
                <span class="loading loading-spinner loading-md"></span>
                <span class="loading loading-spinner loading-lg"></span>
                <span class="loading loading-dots loading-lg"></span>
                <span class="loading loading-ring loading-lg"></span>
                <span class="loading loading-ball loading-lg"></span>
                <span class="loading loading-bars loading-lg"></span>
                <span class="loading loading-infinity loading-lg"></span>
            </div>
        </div>

        <div class="mb-8">
            <h3 class="text-xl font-semibold mb-4">Progress Bars</h3>
            <div class="space-y-4 max-w-md">
                <progress class="progress w-full" value="0" max="100"></progress>
                <progress class="progress progress-primary w-full" value="25" max="100"></progress>
                <progress class="progress progress-secondary w-full" value="50" max="100"></progress>
                <progress class="progress progress-accent w-full" value="75" max="100"></progress>
                <progress class="progress progress-success w-full" value="100" max="100"></progress>
            </div>
        </div>

        <div>
            <h3 class="text-xl font-semibold mb-4">Radial Progress</h3>
            <div class="flex flex-wrap gap-8">
                <div class="radial-progress text-primary" style="--value:25;" role="progressbar">25%</div>
                <div class="radial-progress text-secondary" style="--value:50;" role="progressbar">50%</div>
                <div class="radial-progress text-accent" style="--value:75;" role="progressbar">75%</div>
                <div class="radial-progress text-success" style="--value:100;" role="progressbar">100%</div>
            </div>
        </div>
    </div>
</section>

<!-- Navigation -->
<section class="lcms-section bg-base-200">
    <div class="lcms-container text-center">
        <h2 class="text-2xl font-bold mb-4">Explore More Components</h2>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="/demo-forms" class="btn btn-primary">Forms Demo</a>
            <a href="/demo-data-display" class="btn btn-secondary">Data Display Demo</a>
            <a href="/tailwind-demo" class="btn btn-outline">Back to Overview</a>
        </div>
    </div>
</section>

</div>

<?php get_footer(); ?>
