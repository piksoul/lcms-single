<?php
/**
 * DaisyUI Components Demo - Forms
 *
 * Showcases form inputs, selects, checkboxes, toggles, radios, textareas, and file inputs.
 * Create page with slug "demo-forms" and select "LeanCMS Full Page" template.
 *
 * @filepath templates/pages/slug-demo-forms.php
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
            <div class="badge badge-secondary badge-lg mb-4">DaisyUI Showcase</div>
            <h1 class="text-5xl font-bold">Form Components</h1>
            <p class="py-6 opacity-70">Inputs, selects, checkboxes, toggles, radios, and more.</p>
        </div>
    </div>
</section>

<!-- Text Inputs Section -->
<section class="lcms-section bg-base-100">
    <div class="lcms-container">
        <h2 class="text-3xl font-bold mb-8">Text Inputs</h2>

        <div class="grid md:grid-cols-2 gap-8">
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Default Input</span>
                    <span class="label-text-alt">Required</span>
                </label>
                <input type="text" placeholder="Type here..." class="input input-bordered w-full" />
                <label class="label">
                    <span class="label-text-alt">Helper text goes here</span>
                </label>
            </div>

            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Primary Input</span>
                </label>
                <input type="text" placeholder="Primary style" class="input input-bordered input-primary w-full" />
            </div>

            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Secondary Input</span>
                </label>
                <input type="text" placeholder="Secondary style" class="input input-bordered input-secondary w-full" />
            </div>

            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Accent Input</span>
                </label>
                <input type="text" placeholder="Accent style" class="input input-bordered input-accent w-full" />
            </div>

            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Success Input</span>
                </label>
                <input type="text" placeholder="Valid input" class="input input-bordered input-success w-full" value="Valid value" />
            </div>

            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Error Input</span>
                </label>
                <input type="text" placeholder="Invalid input" class="input input-bordered input-error w-full" value="Invalid" />
                <label class="label">
                    <span class="label-text-alt text-error">This field has an error</span>
                </label>
            </div>
        </div>

        <div class="divider my-8">Input Sizes</div>

        <div class="flex flex-col gap-4">
            <input type="text" placeholder="Extra small (input-xs)" class="input input-bordered input-xs w-full max-w-md" />
            <input type="text" placeholder="Small (input-sm)" class="input input-bordered input-sm w-full max-w-md" />
            <input type="text" placeholder="Medium (default)" class="input input-bordered w-full max-w-md" />
            <input type="text" placeholder="Large (input-lg)" class="input input-bordered input-lg w-full max-w-md" />
        </div>

        <div class="divider my-8">With Icons</div>

        <div class="grid md:grid-cols-2 gap-8">
            <label class="input input-bordered flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" /><path d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" /></svg>
                <input type="text" class="grow" placeholder="Email" />
            </label>

            <label class="input input-bordered flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" /></svg>
                <input type="text" class="grow" placeholder="Search" />
            </label>

            <label class="input input-bordered flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" /></svg>
                <input type="text" class="grow" placeholder="Username" />
            </label>

            <label class="input input-bordered flex items-center gap-2">
                <input type="text" class="grow" placeholder="Password" />
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path fill-rule="evenodd" d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z" clip-rule="evenodd" /></svg>
            </label>
        </div>
    </div>
</section>

<!-- Select Section -->
<section class="lcms-section bg-base-200">
    <div class="lcms-container">
        <h2 class="text-3xl font-bold mb-8">Select / Dropdown</h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Default Select</span>
                </label>
                <select class="select select-bordered w-full">
                    <option disabled selected>Pick one</option>
                    <option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                </select>
            </div>

            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Primary Select</span>
                </label>
                <select class="select select-bordered select-primary w-full">
                    <option disabled selected>Pick one</option>
                    <option>Star Wars</option>
                    <option>Star Trek</option>
                    <option>Stargate</option>
                </select>
            </div>

            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Ghost Select</span>
                </label>
                <select class="select select-ghost w-full">
                    <option disabled selected>Pick one</option>
                    <option>React</option>
                    <option>Vue</option>
                    <option>Angular</option>
                </select>
            </div>
        </div>

        <div class="divider my-8">Select Sizes</div>

        <div class="flex flex-col gap-4 max-w-md">
            <select class="select select-bordered select-xs">
                <option>Extra small</option>
            </select>
            <select class="select select-bordered select-sm">
                <option>Small</option>
            </select>
            <select class="select select-bordered">
                <option>Medium (default)</option>
            </select>
            <select class="select select-bordered select-lg">
                <option>Large</option>
            </select>
        </div>
    </div>
</section>

<!-- Checkbox & Toggle Section -->
<section class="lcms-section bg-base-100">
    <div class="lcms-container">
        <h2 class="text-3xl font-bold mb-8">Checkboxes & Toggles</h2>

        <div class="grid md:grid-cols-2 gap-12">
            <div>
                <h3 class="text-xl font-semibold mb-4">Checkboxes</h3>
                <div class="flex flex-col gap-4">
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-4">
                            <input type="checkbox" class="checkbox" />
                            <span class="label-text">Default checkbox</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-4">
                            <input type="checkbox" checked class="checkbox checkbox-primary" />
                            <span class="label-text">Primary checkbox</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-4">
                            <input type="checkbox" checked class="checkbox checkbox-secondary" />
                            <span class="label-text">Secondary checkbox</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-4">
                            <input type="checkbox" checked class="checkbox checkbox-accent" />
                            <span class="label-text">Accent checkbox</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-4">
                            <input type="checkbox" checked class="checkbox checkbox-success" />
                            <span class="label-text">Success checkbox</span>
                        </label>
                    </div>
                </div>

                <div class="divider">Sizes</div>
                <div class="flex items-center gap-4">
                    <input type="checkbox" checked class="checkbox checkbox-xs" />
                    <input type="checkbox" checked class="checkbox checkbox-sm" />
                    <input type="checkbox" checked class="checkbox checkbox-md" />
                    <input type="checkbox" checked class="checkbox checkbox-lg" />
                </div>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-4">Toggles</h3>
                <div class="flex flex-col gap-4">
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-4">
                            <input type="checkbox" class="toggle" />
                            <span class="label-text">Default toggle</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-4">
                            <input type="checkbox" checked class="toggle toggle-primary" />
                            <span class="label-text">Primary toggle</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-4">
                            <input type="checkbox" checked class="toggle toggle-secondary" />
                            <span class="label-text">Secondary toggle</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-4">
                            <input type="checkbox" checked class="toggle toggle-accent" />
                            <span class="label-text">Accent toggle</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-4">
                            <input type="checkbox" checked class="toggle toggle-success" />
                            <span class="label-text">Success toggle</span>
                        </label>
                    </div>
                </div>

                <div class="divider">Sizes</div>
                <div class="flex items-center gap-4">
                    <input type="checkbox" checked class="toggle toggle-xs" />
                    <input type="checkbox" checked class="toggle toggle-sm" />
                    <input type="checkbox" checked class="toggle toggle-md" />
                    <input type="checkbox" checked class="toggle toggle-lg" />
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Radio Section -->
<section class="lcms-section bg-base-200">
    <div class="lcms-container">
        <h2 class="text-3xl font-bold mb-8">Radio Buttons</h2>

        <div class="grid md:grid-cols-2 gap-12">
            <div>
                <h3 class="text-xl font-semibold mb-4">Radio Group</h3>
                <div class="flex flex-col gap-4">
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-4">
                            <input type="radio" name="radio-1" class="radio" checked />
                            <span class="label-text">Option 1 (selected)</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-4">
                            <input type="radio" name="radio-1" class="radio" />
                            <span class="label-text">Option 2</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-4">
                            <input type="radio" name="radio-1" class="radio" />
                            <span class="label-text">Option 3</span>
                        </label>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-4">Colored Radios</h3>
                <div class="flex flex-col gap-4">
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-4">
                            <input type="radio" name="radio-2" class="radio radio-primary" checked />
                            <span class="label-text">Primary</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-4">
                            <input type="radio" name="radio-3" class="radio radio-secondary" checked />
                            <span class="label-text">Secondary</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-4">
                            <input type="radio" name="radio-4" class="radio radio-accent" checked />
                            <span class="label-text">Accent</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-4">
                            <input type="radio" name="radio-5" class="radio radio-success" checked />
                            <span class="label-text">Success</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Textarea Section -->
<section class="lcms-section bg-base-100">
    <div class="lcms-container">
        <h2 class="text-3xl font-bold mb-8">Textarea</h2>

        <div class="grid md:grid-cols-2 gap-8">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Default Textarea</span>
                </label>
                <textarea class="textarea textarea-bordered h-24" placeholder="Type your message here..."></textarea>
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">Primary Textarea</span>
                </label>
                <textarea class="textarea textarea-bordered textarea-primary h-24" placeholder="Primary style"></textarea>
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">With Character Count</span>
                    <span class="label-text-alt">0/500</span>
                </label>
                <textarea class="textarea textarea-bordered h-24" placeholder="Limited to 500 characters"></textarea>
                <label class="label">
                    <span class="label-text-alt">Maximum 500 characters</span>
                </label>
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">Ghost Textarea</span>
                </label>
                <textarea class="textarea textarea-ghost h-24" placeholder="Ghost style"></textarea>
            </div>
        </div>
    </div>
</section>

<!-- File Input Section -->
<section class="lcms-section bg-base-200">
    <div class="lcms-container">
        <h2 class="text-3xl font-bold mb-8">File Input</h2>

        <div class="grid md:grid-cols-2 gap-8">
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Default File Input</span>
                </label>
                <input type="file" class="file-input file-input-bordered w-full" />
            </div>

            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Primary File Input</span>
                </label>
                <input type="file" class="file-input file-input-bordered file-input-primary w-full" />
            </div>

            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Ghost File Input</span>
                </label>
                <input type="file" class="file-input file-input-ghost w-full" />
            </div>

            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Disabled File Input</span>
                </label>
                <input type="file" class="file-input file-input-bordered w-full" disabled />
            </div>
        </div>
    </div>
</section>

<!-- Range Slider Section -->
<section class="lcms-section bg-base-100">
    <div class="lcms-container">
        <h2 class="text-3xl font-bold mb-8">Range Slider</h2>

        <div class="max-w-lg flex flex-col gap-8">
            <div>
                <label class="label">
                    <span class="label-text">Default Range</span>
                    <span class="label-text-alt">50%</span>
                </label>
                <input type="range" min="0" max="100" value="50" class="range" />
            </div>

            <div>
                <label class="label">
                    <span class="label-text">Primary Range</span>
                </label>
                <input type="range" min="0" max="100" value="70" class="range range-primary" />
            </div>

            <div>
                <label class="label">
                    <span class="label-text">Secondary Range</span>
                </label>
                <input type="range" min="0" max="100" value="40" class="range range-secondary" />
            </div>

            <div>
                <label class="label">
                    <span class="label-text">With Steps</span>
                </label>
                <input type="range" min="0" max="100" value="25" class="range range-accent" step="25" />
                <div class="w-full flex justify-between text-xs px-2">
                    <span>|</span>
                    <span>|</span>
                    <span>|</span>
                    <span>|</span>
                    <span>|</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Rating Section -->
<section class="lcms-section bg-base-200">
    <div class="lcms-container">
        <h2 class="text-3xl font-bold mb-8">Rating</h2>

        <div class="flex flex-col gap-8">
            <div>
                <h3 class="text-xl font-semibold mb-4">Star Rating</h3>
                <div class="rating rating-lg">
                    <input type="radio" name="rating-1" class="mask mask-star-2 bg-orange-400" />
                    <input type="radio" name="rating-1" class="mask mask-star-2 bg-orange-400" />
                    <input type="radio" name="rating-1" class="mask mask-star-2 bg-orange-400" checked />
                    <input type="radio" name="rating-1" class="mask mask-star-2 bg-orange-400" />
                    <input type="radio" name="rating-1" class="mask mask-star-2 bg-orange-400" />
                </div>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-4">Heart Rating</h3>
                <div class="rating rating-lg gap-1">
                    <input type="radio" name="rating-2" class="mask mask-heart bg-red-400" />
                    <input type="radio" name="rating-2" class="mask mask-heart bg-red-400" />
                    <input type="radio" name="rating-2" class="mask mask-heart bg-red-400" />
                    <input type="radio" name="rating-2" class="mask mask-heart bg-red-400" checked />
                    <input type="radio" name="rating-2" class="mask mask-heart bg-red-400" />
                </div>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-4">Rating Sizes</h3>
                <div class="flex items-center gap-8">
                    <div class="rating rating-xs">
                        <input type="radio" name="rating-3" class="mask mask-star-2 bg-primary" />
                        <input type="radio" name="rating-3" class="mask mask-star-2 bg-primary" />
                        <input type="radio" name="rating-3" class="mask mask-star-2 bg-primary" checked />
                        <input type="radio" name="rating-3" class="mask mask-star-2 bg-primary" />
                        <input type="radio" name="rating-3" class="mask mask-star-2 bg-primary" />
                    </div>
                    <div class="rating rating-sm">
                        <input type="radio" name="rating-4" class="mask mask-star-2 bg-primary" />
                        <input type="radio" name="rating-4" class="mask mask-star-2 bg-primary" />
                        <input type="radio" name="rating-4" class="mask mask-star-2 bg-primary" checked />
                        <input type="radio" name="rating-4" class="mask mask-star-2 bg-primary" />
                        <input type="radio" name="rating-4" class="mask mask-star-2 bg-primary" />
                    </div>
                    <div class="rating rating-md">
                        <input type="radio" name="rating-5" class="mask mask-star-2 bg-primary" />
                        <input type="radio" name="rating-5" class="mask mask-star-2 bg-primary" />
                        <input type="radio" name="rating-5" class="mask mask-star-2 bg-primary" checked />
                        <input type="radio" name="rating-5" class="mask mask-star-2 bg-primary" />
                        <input type="radio" name="rating-5" class="mask mask-star-2 bg-primary" />
                    </div>
                    <div class="rating rating-lg">
                        <input type="radio" name="rating-6" class="mask mask-star-2 bg-primary" />
                        <input type="radio" name="rating-6" class="mask mask-star-2 bg-primary" />
                        <input type="radio" name="rating-6" class="mask mask-star-2 bg-primary" checked />
                        <input type="radio" name="rating-6" class="mask mask-star-2 bg-primary" />
                        <input type="radio" name="rating-6" class="mask mask-star-2 bg-primary" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Complete Form Example -->
<section class="lcms-section bg-base-100">
    <div class="lcms-container">
        <h2 class="text-3xl font-bold mb-8">Complete Form Example</h2>

        <div class="card bg-base-200 max-w-2xl mx-auto">
            <div class="card-body">
                <h3 class="card-title">Contact Form</h3>
                <form class="flex flex-col gap-4">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">First Name</span>
                            </label>
                            <input type="text" placeholder="John" class="input input-bordered" />
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Last Name</span>
                            </label>
                            <input type="text" placeholder="Doe" class="input input-bordered" />
                        </div>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email" placeholder="john@example.com" class="input input-bordered" />
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Subject</span>
                        </label>
                        <select class="select select-bordered">
                            <option disabled selected>Choose a subject</option>
                            <option>General Inquiry</option>
                            <option>Technical Support</option>
                            <option>Sales Question</option>
                            <option>Partnership</option>
                        </select>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Message</span>
                        </label>
                        <textarea class="textarea textarea-bordered h-32" placeholder="Your message..."></textarea>
                    </div>

                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-4">
                            <input type="checkbox" class="checkbox checkbox-primary" />
                            <span class="label-text">I agree to the terms and conditions</span>
                        </label>
                    </div>

                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-4">
                            <input type="checkbox" class="toggle toggle-primary" />
                            <span class="label-text">Subscribe to newsletter</span>
                        </label>
                    </div>

                    <div class="card-actions justify-end mt-4">
                        <button type="button" class="btn btn-ghost">Cancel</button>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Navigation -->
<section class="lcms-section bg-base-200">
    <div class="lcms-container text-center">
        <h2 class="text-2xl font-bold mb-6">More Component Demos</h2>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="/demo-ui-components" class="btn btn-outline">UI Components</a>
            <a href="/demo-forms" class="btn btn-primary">Forms (Current)</a>
            <a href="/demo-data-display" class="btn btn-outline">Data Display</a>
        </div>
    </div>
</section>

</div><!-- end data-theme -->

<?php get_footer(); ?>
