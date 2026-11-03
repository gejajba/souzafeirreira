<x-layouts.app :title="$settings->site_title . ' | ' . $settings->site_subtitle">
    <x-header :settings="$settings" />

    <main class="w-full pt-20 bg-surface min-h-[calc(100vh-20rem)]">
        <div class="flex flex-col w-full">
            <x-hero :settings="$settings" />
            <x-institucional :settings="$settings" />
            <x-areas-atuacao :services="$services" :settings="$settings" />
            <x-pilares :pillars="$pillars" />
            <x-artigos :articles="$articles" />
            <x-contato :settings="$settings" :services="$services" />
        </div>
    </main>

    <x-footer :settings="$settings" />
    <x-whatsapp-button :settings="$settings" />

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Menu Mobile Toggle
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuIcon = document.getElementById('mobile-menu-icon');

            if (mobileMenuBtn && mobileMenu && mobileMenuIcon) {
                mobileMenuBtn.addEventListener('click', function () {
                    const isExpanded = mobileMenuBtn.getAttribute('aria-expanded') === 'true';
                    mobileMenuBtn.setAttribute('aria-expanded', !isExpanded);
                    mobileMenu.classList.toggle('hidden');
                    mobileMenuIcon.textContent = isExpanded ? 'menu' : 'close';
                });

                mobileMenu.querySelectorAll('a').forEach(function (link) {
                    link.addEventListener('click', function () {
                        mobileMenu.classList.add('hidden');
                        mobileMenuBtn.setAttribute('aria-expanded', 'false');
                        mobileMenuIcon.textContent = 'menu';
                    });
                });
            }

            // Modais de Serviços
            const serviceCards = document.querySelectorAll('.service-card[data-service-modal]');
            const modals = document.querySelectorAll('.service-modal');
            const closeButtons = document.querySelectorAll('.close-modal');

            serviceCards.forEach(card => {
                card.addEventListener('click', function () {
                    const modalId = this.getAttribute('data-service-modal');
                    const targetModal = document.getElementById(modalId);
                    if (targetModal) {
                        targetModal.classList.remove('hidden');
                        document.body.style.overflow = 'hidden';
                    }
                });
            });

            closeButtons.forEach(btn => {
                btn.addEventListener('click', function () {
                    const modal = this.closest('.service-modal');
                    if (modal) {
                        modal.classList.add('hidden');
                        document.body.style.overflow = '';
                    }
                });
            });

            modals.forEach(modal => {
                modal.addEventListener('click', function (e) {
                    if (e.target === modal) {
                        modal.classList.add('hidden');
                        document.body.style.overflow = '';
                    }
                });
            });

            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    modals.forEach(modal => modal.classList.add('hidden'));
                    document.body.style.overflow = '';
                }
            });

            // Envio Assíncrono do Formulário de Contato
            const contactForm = document.getElementById('contact-form');
            const successMsg = document.getElementById('contact-success-msg');

            if (contactForm && successMsg) {
                contactForm.addEventListener('submit', async function (e) {
                    e.preventDefault();

                    const submitBtn = contactForm.querySelector('button[type="submit"]');
                    const originalBtnContent = submitBtn.innerHTML;
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<span>Enviando...</span>';

                    try {
                        const formData = new FormData(contactForm);
                        const response = await fetch("{{ route('contact.store') }}", {
                            method: 'POST',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json',
                            },
                            body: formData
                        });

                        const result = await response.json();

                        if (response.ok && result.success) {
                            successMsg.textContent = result.message;
                            successMsg.classList.remove('hidden');
                            contactForm.reset();
                            successMsg.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                        } else {
                            alert(result.message || 'Ocorreu um erro ao enviar. Por favor, tente novamente ou entre em contato pelo WhatsApp.');
                        }
                    } catch (error) {
                        // Fallback de submissão padrão se falhar
                        contactForm.submit();
                    } finally {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalBtnContent;
                    }
                });
            }
        });
    </script>
    @endpush
</x-layouts.app>
