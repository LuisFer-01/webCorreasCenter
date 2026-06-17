import type { Categoria } from '@/types';
import { Link, router, usePage } from '@inertiajs/react';
import { ChevronDown, Menu, Phone, Search, X } from 'lucide-react';
import { useEffect, useRef, useState } from 'react';

interface NavigationProps {
    todasCategorias?: Categoria[];
}

export default function Navigation({ todasCategorias = [] }: NavigationProps) {
    const [isOpen, setIsOpen] = useState(false);
    const [showProducts, setShowProducts] = useState(false);
    const [activeCategory, setActiveCategory] = useState<number | null>(null);
    const [searchQuery, setSearchQuery] = useState('');
    const [showSuggestions, setShowSuggestions] = useState(false);
    const [mobileActiveCategory, setMobileActiveCategory] = useState<number | null>(null);

    const searchContainerRef = useRef<HTMLDivElement>(null);
    const { url } = usePage();

    // Datos globales compartidos desde Laravel
    const globalCategories = (usePage().props.globalCategories as Categoria[]) || [];
    const globalIndustries = usePage().props.globalIndustries || [];
    const globalServices = usePage().props.globalServices || [];

    // Productos populares para sugerencias
    const popularProducts = [
        'Correas en V',
        'Rodamientos SKF',
        'Mangueras Hidráulicas',
        'Retenes',
        'Cadenas de Rodillos',
        'Poleas'
    ];

    // Cerrar sugerencias al hacer clic fuera
    useEffect(() => {
        const handleClickOutside = (event: MouseEvent) => {
            if (
                searchContainerRef.current &&
                !searchContainerRef.current.contains(event.target as Node)
            ) {
                setShowSuggestions(false);
            }
        };

        document.addEventListener('mousedown', handleClickOutside);
        return () => document.removeEventListener('mousedown', handleClickOutside);
    }, []);

    // Bloquear scroll cuando menú móvil está abierto
    useEffect(() => {
        if (isOpen) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = 'unset';
        }
        return () => {
            document.body.style.overflow = 'unset';
        };
    }, [isOpen]);

    const handleSearch = (e: React.FormEvent) => {
        e.preventDefault();
        if (searchQuery.trim()) {
            router.get(`/buscar?q=${encodeURIComponent(searchQuery)}`);
            setSearchQuery('');
            setShowSuggestions(false);
            setIsOpen(false);
        }
    };

    const handleSuggestionClick = (suggestion: string) => {
        router.get(`/buscar?q=${encodeURIComponent(suggestion)}`);
        setSearchQuery('');
        setShowSuggestions(false);
        setIsOpen(false);
    };

    const handleLogoClick = () => {
        router.visit('/');
        setIsOpen(false);
    };

    const handleMobileCategoryClick = (index: number) => {
        setMobileActiveCategory(mobileActiveCategory === index ? null : index);
    };

    // Usar categorías de props o de global
    const categoriasDisplay = todasCategorias.length > 0 ? todasCategorias : globalCategories;

    return (
        <nav className="fixed top-0 left-0 right-0 bg-[#b1001b] z-50 shadow-lg">
            <div className="max-w-7xl mx-auto px-3 sm:px-4 md:px-6 lg:px-8">
                <div className="flex justify-between items-center h-16 sm:h-18 md:h-20">
                    {/* LOGO */}
                    <div
                        className="flex items-center cursor-pointer group flex-shrink-0"
                        onClick={handleLogoClick}
                    >
                        <div className="relative h-10 w-auto sm:h-12 md:h-14 flex-shrink-0">
                            <img
                                src="/storage/empresa/Logo_CC_Blanco.png"
                                alt="Correas Center Logo"
                                className="h-full w-auto object-contain group-hover:scale-110 transition-transform duration-500"
                            />
                        </div>
                        <div className="text-white ml-2 sm:ml-3">
                            <h1 className="text-sm sm:text-lg md:text-xl lg:text-2xl font-bold tracking-tight group-hover:text-gray-200 transition-colors leading-tight">
                                CORREAS CENTER
                            </h1>
                            <p className="text-[10px] sm:text-xs text-red-100 leading-tight">Solución Confiable</p>
                        </div>
                    </div>

                    {/* MENÚ DESKTOP */}
                    <div className="hidden lg:flex items-center gap-4 xl:gap-6">
                        {/* BUSCADOR */}
                        <div ref={searchContainerRef} className="relative">
                            <form onSubmit={handleSearch} className="flex items-center">
                                <input
                                    type="text"
                                    value={searchQuery}
                                    onChange={(e) => {
                                        setSearchQuery(e.target.value);
                                        setShowSuggestions(true);
                                    }}
                                    onFocus={() => setShowSuggestions(true)}
                                    placeholder="Buscar productos..."
                                    className="w-48 xl:w-64 px-3 xl:px-4 py-2 rounded-l-md border-0 bg-[#C0939A] focus:bg-[#D9B0B6] focus:outline-none focus:ring-2 focus:ring-white text-gray-900 placeholder:text-gray-700 transition-colors duration-200 text-sm xl:text-base"
                                />
                                <button
                                    type="submit"
                                    className="bg-white text-[#ea0a2c] px-3 xl:px-4 py-2 rounded-r-md hover:bg-gray-100 transition-colors"
                                >
                                    <Search size={20} />
                                </button>
                            </form>

                            {showSuggestions && searchQuery.length === 0 && (
                                <div className="absolute top-full left-0 w-64 xl:w-80 mt-2 bg-white rounded-lg shadow-xl border border-gray-200 py-2 z-50">
                                    <p className="px-4 py-2 text-xs text-gray-500 font-semibold uppercase">Productos populares</p>
                                    {popularProducts.map((product, index) => (
                                        <button
                                            key={index}
                                            onClick={() => handleSuggestionClick(product)}
                                            className="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-[#EA0A2A] transition-colors"
                                        >
                                            {product}
                                        </button>
                                    ))}
                                </div>
                            )}
                        </div>

                        {/* PRODUCTOS - MEGA MENÚ */}
                        <div
                            className="relative"
                            onMouseEnter={() => setShowProducts(true)}
                            onMouseLeave={() => {
                                setShowProducts(false);
                                setActiveCategory(null);
                            }}
                        >
                            <Link
                                href="/categorias"
                                className="flex items-center gap-1 text-white hover:text-gray-200 transition-colors py-2 font-medium"
                            >
                                Productos
                                <ChevronDown size={18} className={`transition-transform duration-200 ${showProducts ? 'rotate-180' : ''}`} />
                            </Link>

                            <div
                                className={`absolute top-full left-0 w-[600px] bg-white rounded-lg shadow-2xl border border-gray-200 p-6 -translate-x-1/4 transition-all duration-300 max-h-[85vh] overflow-y-auto ${
                                    showProducts ? 'opacity-100 visible translate-y-0' : 'opacity-0 invisible -translate-y-2 pointer-events-none'
                                }`}
                            >
                                <div className="grid grid-cols-2 gap-4">
                                    {categoriasDisplay.slice(0, 10).map((categoria, index) => (
                                        <div key={categoria.id} className="relative">
                                            <div
                                                className="flex items-center justify-between cursor-pointer group pb-2 border-b-2 border-[#EA0A2A]"
                                                onClick={() => handleCategoryClick(index)}
                                            >
                                                <Link
                                                    href={`/categoria/${categoria.slug}`}
                                                    className="font-bold text-[#EA0A2A] text-sm uppercase tracking-wide hover:underline"
                                                >
                                                    {categoria.nombre}
                                                </Link>
                                                <ChevronDown
                                                    size={16}
                                                    className={`text-[#EA0A2A] transition-transform duration-300 ${
                                                        activeCategory === index ? 'rotate-180' : ''
                                                    }`}
                                                />
                                            </div>

                                            <div
                                                className={`overflow-hidden transition-all duration-300 ease-in-out ${
                                                    activeCategory === index ? 'max-h-[500px] opacity-100 mt-2' : 'max-h-0 opacity-0 mt-0'
                                                }`}
                                            >
                                                <div className="bg-gray-50 rounded-lg border border-gray-200 p-3">
                                                    <Link
                                                        href={`/categoria/${categoria.slug}`}
                                                        className="text-gray-700 hover:text-[#EA0A2A] text-sm block py-1.5 px-3 rounded hover:bg-white transition-all"
                                                        onClick={() => {
                                                            setShowProducts(false);
                                                            setIsOpen(false);
                                                        }}
                                                    >
                                                        Ver {categoria.nombre} →
                                                    </Link>
                                                </div>
                                            </div>
                                        </div>
                                    ))}
                                </div>
                            </div>
                        </div>

                        {/* APLICACIONES */}
                        <div className="relative group">
                            <button className="flex items-center gap-1 text-white hover:text-gray-200 transition-colors py-2 font-medium">
                                Aplicaciones
                                <ChevronDown size={18} className="transition-transform duration-200 group-hover:rotate-180" />
                            </button>
                            <div className="absolute top-full left-0 w-64 mt-2 bg-white rounded-lg shadow-xl border border-gray-200 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                                {globalIndustries.map((app: any) => (
                                    <Link
                                        key={app.id}
                                        href={`/aplicacion/${app.slug}`}
                                        className="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-100 hover:text-[#EA0A2A] transition-colors"
                                    >
                                        <span>{app.nombre}</span>
                                    </Link>
                                ))}
                            </div>
                        </div>

                        {/* SERVICIOS */}
                        <div className="relative group">
                            <button className="flex items-center gap-1 text-white hover:text-gray-200 transition-colors py-2 font-medium">
                                Servicios
                                <ChevronDown size={18} className="transition-transform duration-200 group-hover:rotate-180" />
                            </button>
                            <div className="absolute top-full left-0 w-72 mt-2 bg-white rounded-lg shadow-xl border border-gray-200 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                                {globalServices.map((service: any) => (
                                    <Link
                                        key={service.id}
                                        href={`/servicio/${service.slug}`}
                                        className="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-100 hover:text-[#EA0A2A] transition-colors"
                                    >
                                        {service.nombre}
                                    </Link>
                                ))}
                            </div>
                        </div>

                        {/* ACERCA DE */}
                        <Link href="/#acerca" className="text-white hover:text-gray-200 transition-colors font-medium">
                            Acerca de
                        </Link>

                        {/* CONTACTO */}
                        <Link href="/sucursales" className="text-white hover:text-gray-200 transition-colors font-medium">
                            Contacto
                        </Link>
                    </div>

                    {/* BOTÓN HAMBURGUESA */}
                    <button
                        onClick={() => setIsOpen(!isOpen)}
                        className="lg:hidden text-white p-2 hover:bg-white/10 rounded-md transition-colors"
                        aria-label="Toggle menu"
                    >
                        {isOpen ? <X size={24} /> : <Menu size={24} />}
                    </button>
                </div>
            </div>

            {/* MENÚ MÓVIL */}
            {isOpen && (
                <>
                    <div
                        className="fixed inset-0 bg-black/50 z-40 lg:hidden"
                        onClick={() => setIsOpen(false)}
                    />

                    <div className="fixed top-16 sm:top-18 right-0 bottom-0 w-[85%] max-w-sm bg-[#b1001b] shadow-2xl lg:hidden z-50 overflow-y-auto animate-slide-in">
                        <div className="px-4 py-4 space-y-4">
                            {/* Buscador móvil */}
                            <form onSubmit={handleSearch} className="flex items-center">
                                <input
                                    type="text"
                                    value={searchQuery}
                                    onChange={(e) => setSearchQuery(e.target.value)}
                                    placeholder="Buscar productos..."
                                    className="flex-1 px-4 py-3 rounded-l-md border-0 bg-[#C0939A] focus:bg-[#D9B0B6] focus:outline-none text-gray-900 placeholder:text-gray-700 text-sm"
                                />
                                <button
                                    type="submit"
                                    className="bg-white text-[#EA0A2A] px-4 py-3 rounded-r-md"
                                >
                                    <Search size={20} />
                                </button>
                            </form>

                            <div className="border-t border-white/20"></div>

                            {/* Productos con acordeón */}
                            <div className="space-y-1">
                                <p className="text-white font-bold text-xs uppercase tracking-wider px-2 py-2">
                                    Productos
                                </p>
                                {categoriasDisplay.map((categoria, index) => (
                                    <div key={categoria.id} className="rounded-md overflow-hidden">
                                        <button
                                            onClick={() => handleMobileCategoryClick(index)}
                                            className="w-full flex items-center justify-between px-3 py-2.5 text-white hover:bg-white/10 transition-colors text-sm font-medium"
                                        >
                                            <span>{categoria.nombre}</span>
                                            <ChevronDown
                                                size={16}
                                                className={`text-white/80 transition-transform duration-300 ${
                                                    mobileActiveCategory === index ? 'rotate-180' : ''
                                                }`}
                                            />
                                        </button>

                                        <div
                                            className={`overflow-hidden transition-all duration-300 ease-in-out ${
                                                mobileActiveCategory === index ? 'max-h-[500px] opacity-100' : 'max-h-0 opacity-0'
                                            }`}
                                        >
                                            <div className="bg-black/20 pl-4 py-2 space-y-1">
                                                <Link
                                                    href={`/categoria/${categoria.slug}`}
                                                    className="block text-white/90 hover:text-white hover:bg-white/10 py-2 px-3 text-sm rounded transition-all"
                                                    onClick={() => setIsOpen(false)}
                                                >
                                                    • Ver {categoria.nombre}
                                                </Link>
                                            </div>
                                        </div>
                                    </div>
                                ))}
                            </div>

                            <div className="border-t border-white/20"></div>

                            {/* Aplicaciones */}
                            <div className="space-y-1">
                                <p className="text-white font-bold text-xs uppercase tracking-wider px-2 py-2">
                                    Aplicaciones
                                </p>
                                {globalIndustries.map((app: any) => (
                                    <Link
                                        key={app.id}
                                        href={`/aplicacion/${app.slug}`}
                                        className="flex items-center gap-3 text-white hover:bg-white/10 px-3 py-2.5 rounded-md transition-colors text-sm"
                                        onClick={() => setIsOpen(false)}
                                    >
                                        <span>{app.nombre}</span>
                                    </Link>
                                ))}
                            </div>

                            <div className="border-t border-white/20"></div>

                            {/* Servicios */}
                            <div className="space-y-1">
                                <p className="text-white font-bold text-xs uppercase tracking-wider px-2 py-2">
                                    Servicios
                                </p>
                                {globalServices.map((service: any) => (
                                    <Link
                                        key={service.id}
                                        href={`/servicio/${service.slug}`}
                                        className="flex items-center gap-3 text-white hover:bg-white/10 px-3 py-2.5 rounded-md transition-colors text-sm"
                                        onClick={() => setIsOpen(false)}
                                    >
                                        <span>{service.nombre}</span>
                                    </Link>
                                ))}
                            </div>

                            <div className="border-t border-white/20"></div>

                            {/* Enlaces principales */}
                            <div className="space-y-1">
                                <Link
                                    href="/#acerca"
                                    className="flex items-center gap-3 text-white hover:bg-white/10 px-3 py-3 rounded-md transition-colors text-sm font-medium"
                                    onClick={() => setIsOpen(false)}
                                >
                                    <span>Acerca de</span>
                                </Link>
                                <Link
                                    href="/sucursales"
                                    className="flex items-center gap-3 text-white hover:bg-white/10 px-3 py-3 rounded-md transition-colors text-sm font-medium"
                                    onClick={() => setIsOpen(false)}
                                >
                                    <span>Contacto</span>
                                </Link>
                            </div>

                            {/* Botón de llamada */}
                            <a
                                href="tel:+59177306576"
                                className="flex items-center justify-center gap-2 bg-white text-[#EA0A2A] px-4 py-3 rounded-md font-semibold hover:bg-gray-100 transition-colors"
                            >
                                <Phone size={18} />
                                Llamar ahora
                            </a>
                        </div>
                    </div>
                </>
            )}

            <style>{`
                @keyframes slide-in {
                    from { transform: translateX(100%); }
                    to { transform: translateX(0); }
                }
                .animate-slide-in {
                    animation: slide-in 0.3s ease-out;
                }
            `}</style>
        </nav>
    );
}

// Función helper para el acordeón
function handleCategoryClick(index: number) {
    // Implementar si es necesario
}
