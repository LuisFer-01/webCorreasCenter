import CategoryCard from '@/components/categorias/CategoriaCard';
import Breadcrumbs from '@/components/layouts/globals/Breadcrumbs';
import GuestLayout from '@/layouts/GuestLayout';
import type { Categoria } from '@/types';

interface CategoriesIndexProps {
    categorias: Categoria[];
}

export default function CategoriesIndex({ categorias }: CategoriesIndexProps) {
    const breadcrumbs = [
        { label: 'Categorías' },
    ];

    return (
        <GuestLayout
            title="Categorías de Productos - Correas Center"
            description="Explora todas nuestras categorías de productos industriales: correas, rodamientos, mangueras, bandas transportadoras y más."
        >
            {/* Header Section */}
            <section className="bg-gradient-to-br from-[#EA0A2A] to-[#9A0820] text-white py-16">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <Breadcrumbs items={breadcrumbs} className="mb-6 text-white/80" />

                    <h1 className="text-4xl sm:text-5xl font-bold mb-4">
                        Nuestras Categorías
                    </h1>
                    <p className="text-xl text-white/90 max-w-3xl">
                        Explora nuestro amplio catálogo de productos industriales organizados por categorías.
                        Encuentra exactamente lo que necesitas para tu operación.
                    </p>
                </div>
            </section>

            {/* Categorías Grid */}
            <section className="py-16 bg-gray-50">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    {/* Stats */}
                    <div className="mb-12 flex flex-wrap gap-6 justify-center">
                        <div className="bg-white px-6 py-4 rounded-lg shadow-md">
                            <p className="text-3xl font-bold text-[#EA0A2A]">{categorias.length}</p>
                            <p className="text-gray-600 text-sm">Categorías disponibles</p>
                        </div>
                        <div className="bg-white px-6 py-4 rounded-lg shadow-md">
                            <p className="text-3xl font-bold text-[#EA0A2A]">
                                {categorias.reduce((acc, cat) => acc + (cat.subcategorias_count || 0), 0)}
                            </p>
                            <p className="text-gray-600 text-sm">Subcategorías</p>
                        </div>
                        <div className="bg-white px-6 py-4 rounded-lg shadow-md">
                            <p className="text-3xl font-bold text-[#EA0A2A]">24+</p>
                            <p className="text-gray-600 text-sm">Marcas internacionales</p>
                        </div>
                    </div>

                    {/* Grid de Categorías */}
                    {categorias.length > 0 ? (
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            {categorias.map((categoria) => (
                                <CategoryCard key={categoria.id} categoria={categoria} />
                            ))}
                        </div>
                    ) : (
                        <div className="text-center py-20">
                            <div className="text-6xl mb-4">📦</div>
                            <h3 className="text-2xl font-bold text-gray-900 mb-2">
                                No hay categorías disponibles
                            </h3>
                            <p className="text-gray-600">
                                Estamos trabajando para agregar más productos pronto.
                            </p>
                        </div>
                    )}
                </div>
            </section>

            {/* CTA Section */}
            <section className="py-16 bg-white">
                <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h2 className="text-3xl font-bold text-gray-900 mb-4">
                        ¿No encuentras lo que buscas?
                    </h2>
                    <p className="text-lg text-gray-600 mb-8">
                        Nuestro equipo técnico puede ayudarte a encontrar el producto exacto que necesitas para tu aplicación.
                    </p>
                    <div className="flex flex-col sm:flex-row gap-4 justify-center">
                        <a
                            href="/contacto"
                            className="inline-flex items-center justify-center gap-2 bg-[#EA0A2A] text-white px-8 py-4 rounded-md hover:bg-[#C10923] transition-all font-semibold text-lg shadow-lg"
                        >
                            Contactar Asesor
                        </a>
                        <a
                            href="/buscar"
                            className="inline-flex items-center justify-center gap-2 bg-white text-[#EA0A2A] px-8 py-4 rounded-md hover:bg-gray-100 transition-all font-semibold text-lg border-2 border-[#EA0A2A]"
                        >
                            Búsqueda Avanzada
                        </a>
                    </div>
                </div>
            </section>
        </GuestLayout>
    );
}
