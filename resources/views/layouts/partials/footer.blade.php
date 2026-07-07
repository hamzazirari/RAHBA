<footer class="bg-slate-900 text-slate-400 pt-16 border-t border-slate-800 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-8 pb-12">
        <!-- Colonne 1 : À propos -->
        <div class="space-y-4">
            <span class="text-2xl font-black text-white tracking-tight flex items-center gap-2">
                <i class="fa-solid fa-shop text-xl text-amber-500"></i> RAHBA
            </span>
            <p class="text-sm leading-relaxed">La première place de marché locale connectant directement acheteurs et vendeurs en toute transparence et sécurité.</p>
            <div class="flex gap-4 text-lg">
                <a href="#" class="hover:text-white transition"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" class="hover:text-white transition"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="hover:text-white transition"><i class="fa-brands fa-linkedin"></i></a>
            </div>
        </div>

        <!-- Colonne 2 : Liens utiles -->
        <div>
            <h3 class="text-white font-bold text-sm uppercase tracking-wider mb-4">Acheter</h3>
            <ul class="space-y-2.5 text-sm">
                <li><a href="{{ route('products.index') }}" class="hover:text-white transition">Catalogue complet</a></li>
                <li><a href="#" class="hover:text-white transition">Garanties Rahba</a></li>
                <li><a href="#" class="hover:text-white transition">Suivi de commande</a></li>
            </ul>
        </div>

        <!-- Colonne 3 : Vendeurs -->
        <div>
            <h3 class="text-white font-bold text-sm uppercase tracking-wider mb-4">Partenaires</h3>
            <ul class="space-y-2.5 text-sm">
                <li><a href="{{ route('register.vendor') }}" class="hover:text-white transition">Créer une boutique</a></li>
                <li><a href="#" class="hover:text-white transition">Charte vendeur</a></li>
                <li><a href="#" class="hover:text-white transition">Espace Logistique</a></li>
            </ul>
        </div>

        <!-- Colonne 4 : Contact -->
        <div>
            <h3 class="text-white font-bold text-sm uppercase tracking-wider mb-4">Contact</h3>
            <ul class="space-y-2.5 text-sm">
                <li><i class="fa-solid fa-location-dot text-amber-500 mr-2"></i> Safi, Maroc</li>
                <li><i class="fa-solid fa-phone text-amber-500 mr-2"></i> +212 524 00 00 00</li>
                <li><i class="fa-solid fa-envelope text-amber-500 mr-2"></i> support@rahba.ma</li>
            </ul>
        </div>
    </div>

    <!-- Bas du footer -->
    <div class="bg-slate-950 py-6 text-center text-xs text-slate-500 border-t border-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-center gap-4">
            <p>&copy; 2026 RAHBA Marketplace. Tous droits réservés.</p>
            <div class="flex gap-4">
                <a href="#" class="hover:underline">Conditions Générales</a>
                <a href="#" class="hover:underline">Politique de Confidentialité</a>
            </div>
        </div>
    </div>
</footer>