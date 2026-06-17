import Breadcrumbs from '@/components/layouts/globals/Breadcrumbs';
import SubcategoryCard from '@/components/subcategorias/SubcategoryCard';
import GuestLayout from '@/layouts/GuestLayout';
import { Link } from '@inertiajs/react';

interface CategoryShowProps {
    categoria: {
        id: number;
        nombre: string;
        slug: string;
        descripcion?: string;
        imagen?: string;
        icon?: string;
        marcas_disponibles?: Array<{
            id: number;
            nombre: string;
            logo: string;
        }>;
    };
    subcategorias: Array<{
        id: number;
        nombre: string;
        slug: string;
        descripcion_corta?: string;
        imagen?: string;
        url?: string;
        marcas_disponibles?: Array<{
            id: number;
            nombre: string;
            logo: string;
        }>;
    }>;
    otrasCategorias?: Array<{
        nombre: string;
        slug: string;
    }>;
}

export default function CategoryShow({
    categoria,
    subcategorias,
    otrasCategorias = []
}: CategoryShowProps) {
    const breadcrumbs = [
        { label: 'Categorías', href: '/categorias' },
        { label: categoria.nombre },
    ];

    return (
        <GuestLayout
            title={`${categoria.nombre} - Correas Center`}
            description={categoria.descripcion || `Explora todas las subcategorías de ${categoria.nombre} en Correas Center.`}
        >
            {/* Hero de Categoría */}
            <section className="relative bg-gradient-to-br from-[#EA0A2A] to-[#9A0820] text-white py-20 overflow-hidden">
                {/* Imagen de fondo con overlay */}
                {categoria.imagen && (
                    <div className="absolute inset-0">
                        <img
                            src={categoria.imagen}
                            alt=""
                            className="w-full h-full object-cover opacity-20"
                        />
                        <div className="absolute inset-0 bg-gradient-to-r from-[#EA0A2A]/95 via-[#EA0A2A]/85 to-[#EA0A2A]/70"></div>
                    </div>
                )}

                <div className="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <Breadcrumbs items={breadcrumbs} className="mb-6 text-white/80" />

                    <div className="flex items-start gap-4 mb-6">
                        {categoria.icon && (
                            <img
                                src={categoria.icon}
                                alt=""
                                className="w-16 h-16 object-contain bg-white/10 rounded-lg p-2"
                            />
                        )}
                        <div>
                            <h1 className="text-4xl sm:text-5xl font-bold mb-2">
                                {categoria.nombre}
                            </h1>
                            <p className="text-white/90 text-lg">
                                {subcategorias.length} {subcategorias.length === 1 ? 'subcategoría disponible' : 'subcategorías disponibles'}
                            </p>
                        </div>
                    </div>

                    {categoria.descripcion && (
                        <p className="text-xl text-white/90 max-w-3xl leading-relaxed">
                            {categoria.descripcion}
                        </p>
                    )}
                </div>
            </section>

            {/* Marcas Disponibles */}
            {categoria.marcas_disponibles && categoria.marcas_disponibles.length > 0 && (
                <section className="py-8 bg-white border-b border-gray-200">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <h3 className="text-sm font-bold text-gray-500 uppercase tracking-wider mb-4">
                            Marcas disponibles en esta categoría
                        </h3>
                        <div className="flex flex-wrap gap-4">
                            {categoria.marcas_disponibles.map((marca) => (
                                <div
                                    key={marca.id}
                                    className="w-20 h-20 bg-gray-50 rounded-lg border border-gray-200 flex items-center justify-center p-2 hover:border-[#EA0A2A] hover:shadow-md transition-all"
                                    title={marca.nombre}
                                >
                                    {marca.logo ? (
                                        <img
                                            src={marca.logo}
                                            alt={marca.nombre}
                                            className="w-full h-full object-contain"
                                        />
                                    ) : (
                                        <span className="text-sm font-bold text-gray-400">
                                            {marca.nombre}
                                        </span>
                                    )}
                                </div>
                            ))}
                        </div>
                    </div>
                </section>
            )}

            {/* Subcategorías Grid */}
            <section className="py-16 bg-gray-50">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="mb-8">
                        <h2 className="text-3xl font-bold text-gray-900 mb-2">
                            Subcategorías
                        </h2>
                        <p className="text-gray-600">
                            Selecciona una subcategoría para ver detalles técnicos, especificaciones y aplicaciones.
                        </p>
                    </div>

                    {subcategorias.length > 0 ? (
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                            {subcategorias.map((subcategoria) => (
                                <SubcategoryCard
                                    key={subcategoria.id}
                                    subcategoria={subcategoria}
                                />
                            ))}
                        </div>
                    ) : (
                        <div className="text-center py-20 bg-white rounded-lg">
                            <div className="text-6xl mb-4">🔍</div>
                            <h3 className="text-2xl font-bold text-gray-900 mb-2">
                                Próximamente
                            </h3>
                            <p className="text-gray-600">
                                Las subcategorías de {categoria.nombre} estarán disponibles pronto.
                            </p>
                        </div>
                    )}
                </div>
            </section>

            {/* Otras Categorías */}
            {otrasCategorias.length > 0 && (
                <section className="py-16 bg-white">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <h2 className="text-3xl font-bold text-gray-900 mb-8">
                            Otras Categorías
                        </h2>
                        <div className="grid grid-cols-2 md:grid-cols-4 gap-4">
                            {otrasCategorias.map((cat) => (
                                <Link
                                    key={cat.slug}
                                    href={`/categoria/${cat.slug}`}
                                    className="bg-gray-50 hover:bg-[#EA0A2A] hover:text-white text-gray-900 px-6 py-4 rounded-lg transition-all duration-300 text-center font-semibold group"
                                >
                                    <span className="group-hover:text-white transition-colors">
                                        {cat.nombre}
                                    </span>
                                </Link>
                            ))}
                        </div>
                    </div>
                </section>
            )}

            {/* CTA Final */}
            <section className="py-16 bg-gradient-to-r from-gray-900 to-gray-800 text-white">
                <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h2 className="text-3xl font-bold mb-4">
                        ¿Necesitas asesoría técnica?
                    </h2>
                    <p className="text-lg text-gray-300 mb-8">
                        Nuestros especialistas pueden ayudarte a seleccionar el producto adecuado para tu aplicación específica.
                    </p>
                    <a
                        href="/contacto"
                        className="inline-flex items-center gap-2 bg-[#EA0A2A] text-white px-8 py-4 rounded-md hover:bg-[#C10923] transition-all font-semibold text-lg shadow-lg"
                    >
                        Solicitar Asesoría Técnica
                    </a>
                </div>
            </section>
        </GuestLayout>
    );
}
