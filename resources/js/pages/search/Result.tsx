import CategoryCard from '@/components/categorias/CategoriaCard';
import Breadcrumbs from '@/components/layouts/globals/Breadcrumbs';
import SubcategoryCard from '@/components/subcategorias/SubcategoryCard';
import GuestLayout from '@/layouts/GuestLayout';
import { Head, router } from '@inertiajs/react';
import { Filter, Search } from 'lucide-react';
import { useState } from 'react';

interface SearchResultsProps {
    query: string;
    resultados: Array<{
        id: number;
        nombre: string;
        slug: string;
        descripcion_corta?: string;
        imagen?: string;
        tipo: 'subcategoria';
        categoria?: { nombre: string; slug: string };
        marcas_disponibles?: Array<{ id: number; nombre: string; logo: string }>;
    }>;
    categorias: Array<{
        id: number;
        nombre: string;
        slug: string;
        descripcion_corta?: string;
        imagen?: string;
        tipo: 'categoria';
        subcategorias_count?: number;
    }>;
    totalResultados: number;
}

export default function SearchResults({
    query,
    resultados,
    categorias,
    totalResultados
}: SearchResultsProps) {
    const [searchTerm, setSearchTerm] = useState(query);

    const handleSearch = (e: React.FormEvent) => {
        e.preventDefault();
        if (searchTerm.trim()) {
            router.get(`/buscar?q=${encodeURIComponent(searchTerm)}`);
        }
    };

    const breadcrumbs = [
        { label: 'Búsqueda', href: '/buscar' },
        { label: query || 'Sin término' },
    ];

    return (
        <GuestLayout
            title={`Búsqueda: ${query} - Correas Center`}
            description={`Resultados de búsqueda para "${query}"`}
        >
            <Head>
                <meta name="robots" content="noindex, follow" />
            </Head>

            {/* Header con Buscador */}
            <section className="bg-gradient-to-br from-[#EA0A2A] to-[#9A0820] text-white py-16">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <Breadcrumbs items={breadcrumbs} className="mb-6 text-white/80" />

                    <h1 className="text-4xl sm:text-5xl font-bold mb-6">
                        Resultados de Búsqueda
                    </h1>

                    {/* Barra de búsqueda */}
                    <form onSubmit={handleSearch} className="max-w-2xl">
                        <div className="flex gap-2">
                            <div className="flex-1 relative">
                                <Search className="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400" size={20} />
                                <input
                                    type="text"
                                    value={searchTerm}
                                    onChange={(e) => setSearchTerm(e.target.value)}
                                    placeholder="Buscar productos, categorías..."
                                    className="w-full pl-12 pr-4 py-4 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-white/50"
                                />
                            </div>
                            <button
                                type="submit"
                                className="bg-white text-[#EA0A2A] px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors"
                            >
                                Buscar
                            </button>
                        </div>
                    </form>
                </div>
            </section>

            {/* Resultados */}
            <section className="py-16 bg-gray-50">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    {/* Stats */}
                    <div className="mb-8 flex items-center justify-between">
                        <p className="text-gray-600">
                            {totalResultados > 0 ? (
                                <>
                                    Mostrando <span className="font-bold text-[#EA0A2A]">{totalResultados}</span> resultados para "
                                    <span className="font-semibold">{query}</span>"
                                </>
                            ) : (
                                <>No se encontraron resultados para "
                                <span className="font-semibold">{query}</span>"</>
                            )}
                        </p>
                    </div>

                    {/* Sin resultados */}
                    {totalResultados === 0 && (
                        <div className="text-center py-20 bg-white rounded-xl">
                            <div className="text-6xl mb-4">🔍</div>
                            <h3 className="text-2xl font-bold text-gray-900 mb-2">
                                No encontramos resultados
                            </h3>
                            <p className="text-gray-600 mb-6">
                                Intenta con otros términos o contáctanos para ayudarte
                            </p>
                            <div className="flex flex-col sm:flex-row gap-4 justify-center">
                                <a
                                    href="/categorias"
                                    className="inline-flex items-center justify-center gap-2 bg-[#EA0A2A] text-white px-6 py-3 rounded-md hover:bg-[#C10923] transition-all font-semibold"
                                >
                                    Ver todas las categorías
                                </a>
                                <a
                                    href="/sucursales"
                                    className="inline-flex items-center justify-center gap-2 bg-white text-[#EA0A2A] px-6 py-3 rounded-md border-2 border-[#EA0A2A] hover:bg-gray-50 transition-all font-semibold"
                                >
                                    Contactar
                                </a>
                            </div>
                        </div>
                    )}

                    {/* Categorías encontradas */}
                    {categorias.length > 0 && (
                        <div className="mb-12">
                            <h2 className="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                                <Filter size={24} className="text-[#EA0A2A]" />
                                Categorías ({categorias.length})
                            </h2>
                            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                {categorias.map((cat) => (
                                    <CategoryCard key={cat.id} categoria={cat} />
                                ))}
                            </div>
                        </div>
                    )}

                    {/* Subcategorías encontradas */}
                    {resultados.length > 0 && (
                        <div>
                            <h2 className="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                                <Filter size={24} className="text-[#EA0A2A]" />
                                Subcategorías ({resultados.length})
                            </h2>
                            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                {resultados.map((sub) => (
                                    <SubcategoryCard key={sub.id} subcategoria={sub} />
                                ))}
                            </div>
                        </div>
                    )}
                </div>
            </section>
        </GuestLayout>
    );
}
