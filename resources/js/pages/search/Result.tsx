import GuestLayout from '@/layouts/GuestLayout';
import { Link } from '@inertiajs/react';
import { Filter, Search } from 'lucide-react';

export default function SearchResults({ auth, query, results, categories }) {
    return (
        <GuestLayout
            title={`Búsqueda: ${query} - Correas Center`}
            description={`Resultados de búsqueda para "${query}"`}
        >
            {/* Header con gradiente */}
            <section className="bg-gradient-to-br from-[#EA0A2A] to-[#9A0820] text-white py-16">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="flex items-center gap-2 mb-4 text-white/80">
                        <Link href="/" className="hover:text-white">
                            Inicio
                        </Link>
                        <span>/</span>
                        <span>Búsqueda</span>
                    </div>
                    <h1 className="text-4xl sm:text-5xl font-bold mb-4">
                        Resultados de búsqueda
                    </h1>
                    <p className="text-xl text-white/90">
                        Mostrando resultados para "<strong>{query}</strong>"
                    </p>
                </div>
            </section>

            {/* Contenido principal - FULL WIDTH */}
            <section className="py-16 bg-gray-50">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="grid grid-cols-1 lg:grid-cols-4 gap-8">
                        {/* Sidebar de filtros */}
                        <aside className="lg:col-span-1">
                            <div className="bg-white rounded-lg shadow-md p-6 sticky top-24">
                                <h3 className="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                                    <Filter size={20} />
                                    Filtros
                                </h3>

                                {categories && categories.length > 0 && (
                                    <div className="mb-6">
                                        <h4 className="font-semibold text-gray-700 mb-2">Categorías</h4>
                                        <div className="space-y-2">
                                            {categories.map((cat) => (
                                                <label key={cat.id} className="flex items-center gap-2 cursor-pointer">
                                                    <input
                                                        type="checkbox"
                                                        className="rounded border-gray-300 text-[#EA0A2A] focus:ring-[#EA0A2A]"
                                                    />
                                                    <span className="text-sm text-gray-700">{cat.nombre}</span>
                                                </label>
                                            ))}
                                        </div>
                                    </div>
                                )}
                            </div>
                        </aside>

                        {/* Resultados - FULL WIDTH del contenedor restante */}
                        <main className="lg:col-span-3">
                            {results && results.length > 0 ? (
                                <div className="space-y-6">
                                    <p className="text-gray-600 mb-6">
                                        Mostrando {results.length} resultado{results.length !== 1 ? 's' : ''} para "{query}"
                                    </p>

                                    <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        {results.map((item) => (
                                            <div key={item.id} className="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow">
                                                {item.imagen && (
                                                    <div className="h-48 bg-gray-200">
                                                        <img
                                                            src={item.imagen}
                                                            alt={item.nombre}
                                                            className="w-full h-full object-cover"
                                                        />
                                                    </div>
                                                )}
                                                <div className="p-6">
                                                    <h3 className="text-xl font-bold text-gray-900 mb-2">
                                                        {item.nombre}
                                                    </h3>
                                                    {item.descripcion_corta && (
                                                        <p className="text-gray-600 text-sm mb-4">
                                                            {item.descripcion_corta}
                                                        </p>
                                                    )}
                                                    <Link
                                                        href={item.url || `/productos/${item.slug}`}
                                                        className="inline-flex items-center text-[#EA0A2A] font-semibold hover:underline"
                                                    >
                                                        Ver más
                                                        <svg className="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 5l7 7-7 7" />
                                                        </svg>
                                                    </Link>
                                                </div>
                                            </div>
                                        ))}
                                    </div>
                                </div>
                            ) : (
                                <div className="text-center py-20 bg-white rounded-lg">
                                    <Search size={64} className="mx-auto text-gray-300 mb-4" />
                                    <h3 className="text-2xl font-bold text-gray-900 mb-2">
                                        No se encontraron resultados
                                    </h3>
                                    <p className="text-gray-600 mb-6">
                                        Intenta con otros términos de búsqueda
                                    </p>
                                    <Link
                                        href="/categorias"
                                        className="inline-flex items-center gap-2 bg-[#EA0A2A] text-white px-6 py-3 rounded-md hover:bg-[#C10923] transition-colors font-semibold"
                                    >
                                        Ver todas las categorías
                                    </Link>
                                </div>
                            )}
                        </main>
                    </div>
                </div>
            </section>
        </GuestLayout>
    );
}
