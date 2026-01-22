<?php
/**
 * DaisyUI Components Demo - Data Display
 *
 * Showcases tables, stats, accordion, timeline, tabs, and more.
 * Create page with slug "demo-data-display" and select "LeanCMS Full Page" template.
 *
 * @filepath templates/pages/slug-demo-data-display.php
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
            <div class="badge badge-accent badge-lg mb-4">DaisyUI Showcase</div>
            <h1 class="text-5xl font-bold">Data Display</h1>
            <p class="py-6 opacity-70">Tables, stats, accordion, timeline, tabs, and more.</p>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="lcms-section bg-base-100">
    <div class="lcms-container">
        <h2 class="text-3xl font-bold mb-8">Stats</h2>

        <div class="mb-8">
            <h3 class="text-xl font-semibold mb-4">Horizontal Stats</h3>
            <div class="stats shadow w-full">
                <div class="stat">
                    <div class="stat-figure text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </div>
                    <div class="stat-title">Total Likes</div>
                    <div class="stat-value text-primary">25.6K</div>
                    <div class="stat-desc">21% more than last month</div>
                </div>

                <div class="stat">
                    <div class="stat-figure text-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <div class="stat-title">Page Views</div>
                    <div class="stat-value text-secondary">2.6M</div>
                    <div class="stat-desc">14% more than last month</div>
                </div>

                <div class="stat">
                    <div class="stat-figure text-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                    </div>
                    <div class="stat-title">Tasks Done</div>
                    <div class="stat-value">86%</div>
                    <div class="stat-desc">31 tasks remaining</div>
                </div>
            </div>
        </div>

        <div>
            <h3 class="text-xl font-semibold mb-4">Stats with Icons & Actions</h3>
            <div class="stats shadow">
                <div class="stat">
                    <div class="stat-figure text-primary">
                        <div class="avatar online">
                            <div class="w-16 rounded-full">
                                <img src="https://picsum.photos/seed/avatar1/200" alt="User avatar" />
                            </div>
                        </div>
                    </div>
                    <div class="stat-value">86%</div>
                    <div class="stat-title">Tasks done</div>
                    <div class="stat-desc text-secondary">31 tasks remaining</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Table Section -->
<section class="lcms-section bg-base-200">
    <div class="lcms-container">
        <h2 class="text-3xl font-bold mb-8">Tables</h2>

        <div class="mb-8">
            <h3 class="text-xl font-semibold mb-4">Basic Table</h3>
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Job</th>
                            <th>Favorite Color</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <td>Cy Ganderton</td>
                            <td>Quality Control Specialist</td>
                            <td>Blue</td>
                        </tr>
                        <tr>
                            <th>2</th>
                            <td>Hart Hagerty</td>
                            <td>Desktop Support Technician</td>
                            <td>Purple</td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <td>Brice Swyre</td>
                            <td>Tax Accountant</td>
                            <td>Red</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mb-8">
            <h3 class="text-xl font-semibold mb-4">Zebra Striped Table</h3>
            <div class="overflow-x-auto">
                <table class="table table-zebra">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Job</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <td>Alice Johnson</td>
                            <td>Software Engineer</td>
                            <td><span class="badge badge-success">Active</span></td>
                        </tr>
                        <tr>
                            <th>2</th>
                            <td>Bob Smith</td>
                            <td>Product Manager</td>
                            <td><span class="badge badge-warning">Away</span></td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <td>Carol Williams</td>
                            <td>UX Designer</td>
                            <td><span class="badge badge-success">Active</span></td>
                        </tr>
                        <tr>
                            <th>4</th>
                            <td>David Brown</td>
                            <td>Data Analyst</td>
                            <td><span class="badge badge-error">Offline</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            <h3 class="text-xl font-semibold mb-4">Table with Avatars</h3>
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <label>
                                    <input type="checkbox" class="checkbox" />
                                </label>
                            </th>
                            <th>Name</th>
                            <th>Job</th>
                            <th>Favorite Color</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>
                                <label>
                                    <input type="checkbox" class="checkbox" />
                                </label>
                            </th>
                            <td>
                                <div class="flex items-center gap-3">
                                    <div class="avatar">
                                        <div class="mask mask-squircle w-12 h-12">
                                            <img src="https://picsum.photos/seed/person1/100" alt="Avatar" />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-bold">Hart Hagerty</div>
                                        <div class="text-sm opacity-50">United States</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                Zemlak, Daniel and Leannon
                                <br/><span class="badge badge-ghost badge-sm">Desktop Support</span>
                            </td>
                            <td>Purple</td>
                            <th>
                                <button class="btn btn-ghost btn-xs">details</button>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label>
                                    <input type="checkbox" class="checkbox" />
                                </label>
                            </th>
                            <td>
                                <div class="flex items-center gap-3">
                                    <div class="avatar">
                                        <div class="mask mask-squircle w-12 h-12">
                                            <img src="https://picsum.photos/seed/person2/100" alt="Avatar" />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-bold">Brice Swyre</div>
                                        <div class="text-sm opacity-50">China</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                Carroll Group
                                <br/><span class="badge badge-ghost badge-sm">Tax Accountant</span>
                            </td>
                            <td>Red</td>
                            <th>
                                <button class="btn btn-ghost btn-xs">details</button>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Accordion Section -->
<section class="lcms-section bg-base-100">
    <div class="lcms-container">
        <h2 class="text-3xl font-bold mb-8">Accordion</h2>

        <div class="grid md:grid-cols-2 gap-8">
            <div>
                <h3 class="text-xl font-semibold mb-4">Arrow Style</h3>
                <div class="join join-vertical w-full">
                    <div class="collapse collapse-arrow join-item border border-base-300">
                        <input type="radio" name="accordion-1" checked="checked" />
                        <div class="collapse-title text-xl font-medium">
                            What is DaisyUI?
                        </div>
                        <div class="collapse-content">
                            <p>DaisyUI is a component library for Tailwind CSS that provides pre-designed components you can use in your projects.</p>
                        </div>
                    </div>
                    <div class="collapse collapse-arrow join-item border border-base-300">
                        <input type="radio" name="accordion-1" />
                        <div class="collapse-title text-xl font-medium">
                            How do I install it?
                        </div>
                        <div class="collapse-content">
                            <p>You can install DaisyUI via npm: npm install daisyui and add it as a plugin in your tailwind.config.js file.</p>
                        </div>
                    </div>
                    <div class="collapse collapse-arrow join-item border border-base-300">
                        <input type="radio" name="accordion-1" />
                        <div class="collapse-title text-xl font-medium">
                            Is it free to use?
                        </div>
                        <div class="collapse-content">
                            <p>Yes! DaisyUI is completely free and open source. You can use it in personal and commercial projects.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-4">Plus/Minus Style</h3>
                <div class="join join-vertical w-full">
                    <div class="collapse collapse-plus join-item border border-base-300">
                        <input type="radio" name="accordion-2" checked="checked" />
                        <div class="collapse-title text-xl font-medium">
                            Getting Started
                        </div>
                        <div class="collapse-content">
                            <p>Start by installing the necessary dependencies and setting up your project structure.</p>
                        </div>
                    </div>
                    <div class="collapse collapse-plus join-item border border-base-300">
                        <input type="radio" name="accordion-2" />
                        <div class="collapse-title text-xl font-medium">
                            Configuration
                        </div>
                        <div class="collapse-content">
                            <p>Configure your theme colors, fonts, and other settings in the config file.</p>
                        </div>
                    </div>
                    <div class="collapse collapse-plus join-item border border-base-300">
                        <input type="radio" name="accordion-2" />
                        <div class="collapse-title text-xl font-medium">
                            Deployment
                        </div>
                        <div class="collapse-content">
                            <p>Deploy your application to your preferred hosting platform.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tabs Section -->
<section class="lcms-section bg-base-200">
    <div class="lcms-container">
        <h2 class="text-3xl font-bold mb-8">Tabs</h2>

        <div class="mb-8">
            <h3 class="text-xl font-semibold mb-4">Basic Tabs</h3>
            <div role="tablist" class="tabs tabs-boxed">
                <a role="tab" class="tab">Tab 1</a>
                <a role="tab" class="tab tab-active">Tab 2</a>
                <a role="tab" class="tab">Tab 3</a>
            </div>
        </div>

        <div class="mb-8">
            <h3 class="text-xl font-semibold mb-4">Bordered Tabs</h3>
            <div role="tablist" class="tabs tabs-bordered">
                <a role="tab" class="tab">Tab 1</a>
                <a role="tab" class="tab tab-active">Tab 2</a>
                <a role="tab" class="tab">Tab 3</a>
            </div>
        </div>

        <div class="mb-8">
            <h3 class="text-xl font-semibold mb-4">Lifted Tabs</h3>
            <div role="tablist" class="tabs tabs-lifted">
                <a role="tab" class="tab">Tab 1</a>
                <a role="tab" class="tab tab-active">Tab 2</a>
                <a role="tab" class="tab">Tab 3</a>
            </div>
        </div>

        <div>
            <h3 class="text-xl font-semibold mb-4">Tab Sizes</h3>
            <div class="flex flex-col gap-4">
                <div role="tablist" class="tabs tabs-boxed tabs-xs">
                    <a role="tab" class="tab">Tiny</a>
                    <a role="tab" class="tab tab-active">Tabs</a>
                    <a role="tab" class="tab">Example</a>
                </div>
                <div role="tablist" class="tabs tabs-boxed tabs-sm">
                    <a role="tab" class="tab">Small</a>
                    <a role="tab" class="tab tab-active">Tabs</a>
                    <a role="tab" class="tab">Example</a>
                </div>
                <div role="tablist" class="tabs tabs-boxed">
                    <a role="tab" class="tab">Normal</a>
                    <a role="tab" class="tab tab-active">Tabs</a>
                    <a role="tab" class="tab">Example</a>
                </div>
                <div role="tablist" class="tabs tabs-boxed tabs-lg">
                    <a role="tab" class="tab">Large</a>
                    <a role="tab" class="tab tab-active">Tabs</a>
                    <a role="tab" class="tab">Example</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Timeline Section -->
<section class="lcms-section bg-base-100">
    <div class="lcms-container">
        <h2 class="text-3xl font-bold mb-8">Timeline</h2>

        <ul class="timeline timeline-vertical lg:timeline-horizontal">
            <li>
                <div class="timeline-start timeline-box">First Macintosh computer</div>
                <div class="timeline-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-primary"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                </div>
                <hr class="bg-primary"/>
            </li>
            <li>
                <hr class="bg-primary"/>
                <div class="timeline-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-primary"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                </div>
                <div class="timeline-end timeline-box">iMac</div>
                <hr class="bg-primary"/>
            </li>
            <li>
                <hr class="bg-primary"/>
                <div class="timeline-start timeline-box">iPod</div>
                <div class="timeline-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-primary"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                </div>
                <hr/>
            </li>
            <li>
                <hr/>
                <div class="timeline-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                </div>
                <div class="timeline-end timeline-box">iPhone</div>
                <hr/>
            </li>
            <li>
                <hr/>
                <div class="timeline-start timeline-box">Apple Watch</div>
                <div class="timeline-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                </div>
            </li>
        </ul>
    </div>
</section>

<!-- Avatar Section -->
<section class="lcms-section bg-base-200">
    <div class="lcms-container">
        <h2 class="text-3xl font-bold mb-8">Avatars</h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div>
                <h3 class="text-xl font-semibold mb-4">Sizes</h3>
                <div class="flex items-center gap-4">
                    <div class="avatar">
                        <div class="w-8 rounded">
                            <img src="https://picsum.photos/seed/av1/100" alt="Avatar" />
                        </div>
                    </div>
                    <div class="avatar">
                        <div class="w-12 rounded">
                            <img src="https://picsum.photos/seed/av2/100" alt="Avatar" />
                        </div>
                    </div>
                    <div class="avatar">
                        <div class="w-16 rounded">
                            <img src="https://picsum.photos/seed/av3/100" alt="Avatar" />
                        </div>
                    </div>
                    <div class="avatar">
                        <div class="w-24 rounded">
                            <img src="https://picsum.photos/seed/av4/100" alt="Avatar" />
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-4">Shapes</h3>
                <div class="flex items-center gap-4">
                    <div class="avatar">
                        <div class="w-16 rounded">
                            <img src="https://picsum.photos/seed/av5/100" alt="Avatar" />
                        </div>
                    </div>
                    <div class="avatar">
                        <div class="w-16 rounded-full">
                            <img src="https://picsum.photos/seed/av6/100" alt="Avatar" />
                        </div>
                    </div>
                    <div class="avatar">
                        <div class="w-16 mask mask-squircle">
                            <img src="https://picsum.photos/seed/av7/100" alt="Avatar" />
                        </div>
                    </div>
                    <div class="avatar">
                        <div class="w-16 mask mask-hexagon">
                            <img src="https://picsum.photos/seed/av8/100" alt="Avatar" />
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-4">With Status</h3>
                <div class="flex items-center gap-4">
                    <div class="avatar online">
                        <div class="w-16 rounded-full">
                            <img src="https://picsum.photos/seed/av9/100" alt="Avatar" />
                        </div>
                    </div>
                    <div class="avatar offline">
                        <div class="w-16 rounded-full">
                            <img src="https://picsum.photos/seed/av10/100" alt="Avatar" />
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-4">Placeholder</h3>
                <div class="flex items-center gap-4">
                    <div class="avatar placeholder">
                        <div class="bg-neutral text-neutral-content rounded-full w-16">
                            <span class="text-xl">JD</span>
                        </div>
                    </div>
                    <div class="avatar placeholder">
                        <div class="bg-primary text-primary-content rounded-full w-16">
                            <span class="text-xl">MK</span>
                        </div>
                    </div>
                    <div class="avatar placeholder">
                        <div class="bg-secondary text-secondary-content rounded-full w-16">
                            <span class="text-xl">AB</span>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-4">Avatar Group</h3>
                <div class="avatar-group -space-x-6 rtl:space-x-reverse">
                    <div class="avatar">
                        <div class="w-12">
                            <img src="https://picsum.photos/seed/grp1/100" alt="Avatar" />
                        </div>
                    </div>
                    <div class="avatar">
                        <div class="w-12">
                            <img src="https://picsum.photos/seed/grp2/100" alt="Avatar" />
                        </div>
                    </div>
                    <div class="avatar">
                        <div class="w-12">
                            <img src="https://picsum.photos/seed/grp3/100" alt="Avatar" />
                        </div>
                    </div>
                    <div class="avatar placeholder">
                        <div class="w-12 bg-neutral text-neutral-content">
                            <span>+99</span>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-4">Ring Style</h3>
                <div class="flex items-center gap-4">
                    <div class="avatar">
                        <div class="w-16 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                            <img src="https://picsum.photos/seed/ring1/100" alt="Avatar" />
                        </div>
                    </div>
                    <div class="avatar">
                        <div class="w-16 rounded-full ring ring-secondary ring-offset-base-100 ring-offset-2">
                            <img src="https://picsum.photos/seed/ring2/100" alt="Avatar" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Breadcrumbs Section -->
<section class="lcms-section bg-base-100">
    <div class="lcms-container">
        <h2 class="text-3xl font-bold mb-8">Breadcrumbs</h2>

        <div class="flex flex-col gap-6">
            <div>
                <h3 class="text-xl font-semibold mb-4">Default</h3>
                <div class="text-sm breadcrumbs">
                    <ul>
                        <li><a>Home</a></li>
                        <li><a>Documents</a></li>
                        <li><a>Add Document</a></li>
                    </ul>
                </div>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-4">With Icons</h3>
                <div class="text-sm breadcrumbs">
                    <ul>
                        <li>
                            <a>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-2 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <a>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-2 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                                Documents
                            </a>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-2 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            Add Document
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pagination Section -->
<section class="lcms-section bg-base-200">
    <div class="lcms-container">
        <h2 class="text-3xl font-bold mb-8">Pagination</h2>

        <div class="flex flex-col gap-8">
            <div>
                <h3 class="text-xl font-semibold mb-4">Default</h3>
                <div class="join">
                    <button class="join-item btn">1</button>
                    <button class="join-item btn btn-active">2</button>
                    <button class="join-item btn">3</button>
                    <button class="join-item btn">4</button>
                </div>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-4">With Arrows</h3>
                <div class="join">
                    <button class="join-item btn">&laquo;</button>
                    <button class="join-item btn">Page 22</button>
                    <button class="join-item btn">&raquo;</button>
                </div>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-4">Outline Style</h3>
                <div class="join">
                    <button class="join-item btn btn-outline">1</button>
                    <button class="join-item btn btn-outline btn-active">2</button>
                    <button class="join-item btn btn-outline">3</button>
                    <button class="join-item btn btn-outline">4</button>
                </div>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-4">With Disabled</h3>
                <div class="join">
                    <button class="join-item btn btn-outline" disabled>&laquo;</button>
                    <button class="join-item btn btn-outline">1</button>
                    <button class="join-item btn btn-outline btn-active">2</button>
                    <button class="join-item btn btn-outline">3</button>
                    <button class="join-item btn btn-outline">&raquo;</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Steps Section -->
<section class="lcms-section bg-base-100">
    <div class="lcms-container">
        <h2 class="text-3xl font-bold mb-8">Steps</h2>

        <div class="flex flex-col gap-8">
            <div>
                <h3 class="text-xl font-semibold mb-4">Horizontal Steps</h3>
                <ul class="steps w-full">
                    <li class="step step-primary">Register</li>
                    <li class="step step-primary">Choose plan</li>
                    <li class="step">Purchase</li>
                    <li class="step">Receive Product</li>
                </ul>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-4">With Data Content</h3>
                <ul class="steps">
                    <li data-content="?" class="step step-neutral">Step 1</li>
                    <li data-content="!" class="step step-neutral">Step 2</li>
                    <li data-content="✓" class="step step-neutral">Step 3</li>
                    <li data-content="✕" class="step step-neutral">Step 4</li>
                    <li data-content="★" class="step step-neutral">Step 5</li>
                    <li data-content="" class="step step-neutral">Step 6</li>
                    <li data-content="●" class="step step-neutral">Step 7</li>
                </ul>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-4">Colored Steps</h3>
                <ul class="steps">
                    <li class="step step-info">Fly to moon</li>
                    <li class="step step-info">Plant flag</li>
                    <li class="step step-info">Return safely</li>
                    <li class="step step-error" data-content="✕">World peace</li>
                </ul>
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
            <a href="/demo-forms" class="btn btn-outline">Forms</a>
            <a href="/demo-data-display" class="btn btn-primary">Data Display (Current)</a>
        </div>
    </div>
</section>

</div><!-- end data-theme -->

<?php get_footer(); ?>
