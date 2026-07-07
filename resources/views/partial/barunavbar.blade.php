<nav class="navbar navbar-light bg-transparent flex-column align-items-start custom-navbar mt-5">
    <a class="navbar-brand text-white nav-link-item" {{ $active === 'baru' ? 'active' : '' }} href="/"
        data-label="Home">Home</a>
    <a class="navbar-brand text-white nav-link-item" {{ $active === 'project' ? 'active' : '' }} href="/project"
        data-label="Project">Project</a>
    <a class="navbar-brand text-white nav-link-item" {{ $active === 'info' ? 'active' : '' }} href="/info"
        data-label="Info">Info</a>
    <a class="navbar-brand text-white nav-link-item" {{ $active === 'contact' ? 'active' : '' }} href="/contact"
        data-label="Contact">Contact</a>
    <a class="navbar-brand text-white nav-link-item" {{ $active === 'FAQ' ? 'active' : '' }} href="/faq"
        data-label="FAQ">FAQ</a>
    <a class="navbar-brand text-white nav-link-item" {{ $active === 'copycats' ? 'active' : '' }} href="/copycat"
        data-label="Copycats">Copycats</a>
</nav>
