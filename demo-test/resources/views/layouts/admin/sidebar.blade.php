 <style>
     :root {
         --primary: #ff3333;
         --dark: #111111;
         --light: #ffffff;
         --gray: #f5f5f5;
         --text-muted: #666666;
         --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
     }

     * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         font-family: 'Poppins', sans-serif;
     }

     body {
         background: var(--light);
         transition: var(--transition);
     }

     /* Sidebar Styles */
     .sidebar {
         position: fixed;
         top: 0;
         left: 0;
         height: 100vh;
         width: 80px;
         background: var(--light);
         border-right: 1px solid rgba(0, 0, 0, 0.05);
         transition: var(--transition);
         display: flex;
         flex-direction: column;
         overflow: hidden;
         z-index: 100;
     }

     .sidebar:hover {
         width: 250px;
     }

     /* Logo Section */
     .sidebar-logo {
         display: flex;
         align-items: center;
         padding: 20px;
         background: var(--dark);
         color: var(--light);
         justify-content: center;
         position: sticky;
         top: 0;
         z-index: 101;
         /* To ensure logo stays above navigation */
     }

     .sidebar-logo svg {
         width: 40px;
         height: 40px;
         margin-right: 10px;
         animation: pulse 2s infinite;
     }

     .sidebar-logo-text {
         display: block;
         font-size: 1.5rem;
         font-weight: 700;
     }

     .sidebar:hover .sidebar-logo-text {
         display: block;
     }

     /* Navigation */
     .sidebar-nav {
         flex-grow: 1;
         display: flex;
         flex-direction: column;
         padding: 20px 0;
         overflow-y: auto;
         /* Enables vertical scrolling */
         height: calc(100vh - 80px);
         /* Adjust height to allow for the logo section */
     }

     .nav-link {
         display: flex;
         align-items: center;
         padding: 12px 20px;
         margin: 0px 20px;
         text-decoration: none;
         color: var(--text-muted);
         transition: var(--transition);
         position: relative;
         overflow: hidden;
     }

     .nav-link-icon {
         width: 24px;
         height: 24px;
         margin-right: 15px;
         transition: var(--transition);
     }

     .nav-link-text {
         display: none;
         white-space: nowrap;
     }

     .sidebar:hover .nav-link-text {
         display: inline-block;
     }

     .nav-link:hover {
         background: rgba(255, 51, 51, 0.05);
         color: var(--primary);
     }

     .nav-link.active {
         background: var(--primary);
         color: var(--light);
     }

     .nav-link::before {
         content: '';
         position: absolute;
         bottom: 0;
         left: 0;
         width: 0;
         height: 2px;
         background: var(--primary);
         transition: width 0.3s ease;
     }

     .nav-link:hover::before {
         width: 100%;
     }

     /* Add white circle when nav-link is active */
     .nav-link.active::after {
         content: '';
         position: absolute;
         left: 85%;
         width: 10px;
         height: 10px;
         border-radius: 50%;
         background-color: var(--light);
     }

     /* Position adjustment for nav-link icon to accommodate the circle */
     .nav-link.active .nav-link-icon {
         margin-left: 20px;
     }


     /* Footer */
     .sidebar-footer {
         padding: 20px;
         border-top: 1px solid rgba(0, 0, 0, 0.05);
     }

     .sidebar:hover .logout-text {
         display: inline-block;
     }

     /* Theme Toggle */
     .theme-toggle {
         position: fixed;
         top: 20px;
         right: 20px;
         width: 50px;
         height: 50px;
         background: var(--dark);
         color: var(--light);
         border: none;
         border-radius: 50%;
         display: flex;
         align-items: center;
         justify-content: center;
         cursor: pointer;
         z-index: 200;
     }

     /* Dark Mode */
     [data-theme="dark"] {
         --light: #111111;
         --dark: #ffffff;
         --gray: rgba(255, 255, 255, 0.05);
         --text-muted: #aaaaaa;
     }

     [data-theme="dark"] .sidebar {
         background: var(--light);
         border-right: 1px solid rgba(255, 255, 255, 0.1);
     }

     /* Animations */
     @keyframes pulse {

         0%,
         100% {
             transform: scale(1);
         }

         50% {
             transform: scale(1.05);
         }
     }

     /* Responsive */
     @media (max-width: 768px) {
         .sidebar {
             width: 60px;
         }

         .sidebar:hover {
             width: 60px;
         }

         .nav-link-text,
         .logout-text,
         .sidebar-logo-text {
             display: none;
         }
     }
 </style>
 <aside id="sidebar"
     class="fixed left-0 top-0 h-full w-64 bg-white text-gray-900 dark:bg-gray-800 dark:text-white transform -translate-x-full transition-transform duration-300 shadow-lg overflow-y-auto z-50">
     <!-- Logo Section -->
     <div class="sidebar-logo">
         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
             <circle cx="12" cy="12" r="10" />
             <path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83M16.62 12l-5.74 9.94" />
         </svg>
         <span class="sidebar-logo-text">PartSix</span>
     </div>

     <!-- Navigation Links -->
     <nav class="sidebar-nav space-y-4 px-4 py-6">
         <a href="{{ route('dashboard') }}"
             class="nav-link flex items-center px-4 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200 {{ request()->routeIs('dashboard') ? 'active' : '' }}">
             <i class="fa-regular fa-house mr-3" style="font-size: 24px; width: 30px; line-height: 1;"></i>
             Dashboard
         </a>
         <a href="{{ route('users.index') }}"
             class="nav-link flex items-center px-4 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200 {{ request()->routeIs('users.*') ? 'active' : '' }}">
             <i class="fa-regular fa-user mr-3" style="font-size: 24px; width: 30px; line-height: 1;"></i>
             Users
         </a>
         <a href="{{ route('products.index') }}"
             class="nav-link flex items-center px-4 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200 {{ request()->routeIs('products.*') ? 'active' : '' }}">
             <i class="fa-regular fa-box mr-3" style="font-size: 24px; width: 30px; line-height: 1;"></i>
             Products
         </a>
         <a href="{{ route('orders.index') }}"
             class="nav-link flex items-center px-4 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200 {{ request()->routeIs('orders.*') ? 'active' : '' }}">
             <i class="fa-regular fa-bag-shopping mr-3" style="font-size: 24px; width: 30px; line-height: 1;"></i>
             Orders
         </a>
         <a href="{{ route('categories.index') }}"
             class="nav-link flex items-center px-4 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200 {{ request()->routeIs('categories.*') ? 'active' : '' }}">
             <i class="fa-regular fa-objects-column mr-3" style="font-size: 24px; width: 30px; line-height: 1;"></i>
             Categories
         </a>
         <a href="{{ route('coupons.index') }}"
             class="nav-link flex items-center px-4 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200 {{ request()->routeIs('coupons.*') ? 'active' : '' }}">
             <i class="fa-regular fa-ticket mr-3" style="font-size: 24px; width: 30px; line-height: 1;"></i>
             Coupons
         </a>

         <a href="{{ route('discounts.index') }}"
             class="nav-link flex items-center px-4 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200 {{ request()->routeIs('discounts.*') ? 'active' : '' }}">
             <i class="fa-sharp fa-regular fa-badge-percent mr-3" style="font-size: 24px; width: 30px; line-height: 1;"></i>
             Discounts
         </a>
         <a href="{{ route('reviews.index') }}"
             class="nav-link flex items-center px-4 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200 {{ request()->routeIs('reviews.*') ? 'active' : '' }}">
             <i class="fa-solid fa-star-sharp-half-stroke mr-3" style="font-size: 24px; width: 30px; line-height: 1;"></i>
             Reviews
         </a>
         <a href="{{ route('brands.index') }}"
             class="nav-link flex items-center px-4 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200 {{ request()->routeIs('brands.*') ? 'active' : '' }}">
             <i class="fa-regular fa-tag mr-3" style="font-size: 24px; width: 30px; line-height: 1;"></i>
             Brands
         </a>
         <a href="{{ route('contacts.index') }}"
             class="nav-link flex items-center px-4 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200 {{ request()->routeIs('contacts.*') ? 'active' : '' }}">
             <i class="fa-regular fa-address-book mr-3" style="font-size: 24px; width: 30px; line-height: 1;"></i>
             Contacts
         </a>
         <!-- More Links -->
     </nav>
 </aside>
 