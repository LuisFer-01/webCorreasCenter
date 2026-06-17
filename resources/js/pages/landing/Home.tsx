import CategoryCard from '@/components/categorias/CategoriaCard';
import IndustryCard from '@/components/industrias/IndustryCard';
import ServiceCard from '@/components/servicios/ServiceCard';
import GuestLayout from '@/layouts/GuestLayout';
import type { Categoria, Industria, Servicio, Sucursal } from '@/types';

interface HomeProps {
    categoriasDestacadas: Categoria[];
    todasCategorias: Array<{ id: number; nombre: string; slug: string }>;
    serviciosDestacados: Servicio[];
    industrias: Industria[];
    marcas: Array<{ id: number; nombre: string; logo: string; descripcion?: string }>;
    sucursales: Sucursal[];
    stats: {
        total_categorias: number;
        total_subcategorias: number;
        total_marcas: number;
        total_servicios: number;
        total_industrias: number;
    };
}

export default function Home({
    categoriasDestacadas,
    todasCategorias,
    serviciosDestacados,
    industrias,
    marcas,
    sucursales,
    stats,
}: HomeProps) {
    return (
        <GuestLayout title="Correas Center - Soluciones Industriales en Bolivia">
            {/* Hero Section */}
            <section className="relative bg-gradient-to-br from-[#EA0A2A] to-[#9A0820] text-white py-20 overflow-hidden">
                <div className="absolute inset-0 opacity-10">
                    <div className="absolute inset-0 bg-[url('/pattern.png')] bg-repeat"></div>
                </div>

                <div className="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h1 className="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                        Soluciones Industriales Confiables
                    </h1>
                    <p className="text-xl text-white/90 mb-8 max-w-3xl mx-auto leading-relaxed">
                        Más de 25 años brindando repuestos, fabricación especializada y soporte técnico para la industria boliviana.
                    </p>
                    <div className="flex flex-col sm:flex-row gap-4 justify-center">
                        <a
                            href="/categorias"
                            className="inline-flex items-center justify-center gap-2 bg-white text-[#EA0A2A] px-8 py-4 rounded-md hover:bg-gray-100 transition-all font-semibold text-lg shadow-lg hover:shadow-xl hover:scale-105"
                        >
                            Ver Productos
                        </a>
                        <a
                            href="/sucursales"
                            className="inline-flex items-center justify-center gap-2 bg-white/10 backdrop-blur-sm text-white px-8 py-4 rounded-md hover:bg-white/20 transition-all font-semibold text-lg border border-white/30"
                        >
                            Contactar
                        </a>
                    </div>

                    {/* Stats */}
                    <div className="mt-16 grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
                        <div className="bg-white/10 backdrop-blur-sm rounded-lg p-4 border border-white/20">
                            <p className="text-3xl font-bold">{stats.total_categorias}+</p>
                            <p className="text-sm text-white/80">Categorías</p>
                        </div>
                        <div className="bg-white/10 backdrop-blur-sm rounded-lg p-4 border border-white/20">
                            <p className="text-3xl font-bold">{stats.total_subcategorias}+</p>
                            <p className="text-sm text-white/80">Subcategorías</p>
                        </div>
                        <div className="bg-white/10 backdrop-blur-sm rounded-lg p-4 border border-white/20">
                            <p className="text-3xl font-bold">{stats.total_marcas}+</p>
                            <p className="text-sm text-white/80">Marcas</p>
                        </div>
                        <div className="bg-white/10 backdrop-blur-sm rounded-lg p-4 border border-white/20">
                            <p className="text-3xl font-bold">25+</p>
                            <p className="text-sm text-white/80">Años de experiencia</p>
                        </div>
                    </div>
                </div>
            </section>

            {/* Categorías Destacadas */}
            <section className="py-16 bg-gray-50">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="text-center mb-12">
                        <h2 className="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                            Nuestras Categorías
                        </h2>
                        <p className="text-lg text-gray-600 max-w-2xl mx-auto">
                            Explora nuestro amplio catálogo de productos industriales
                        </p>
                    </div>

                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        {categoriasDestacadas.map((categoria) => (
                            <CategoryCard key={categoria.id} categoria={categoria} />
                        ))}
                    </div>

                    <div className="text-center mt-8">
                        <a
                            href="/categorias"
                            className="inline-flex items-center gap-2 text-[#EA0A2A] hover:text-[#C10923] font-semibold text-lg transition-colors"
                        >
                            Ver todas las categorías
                            <svg className="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </section>

            {/* Carrusel de Marcas */}
            <section className="py-12 bg-white border-y border-gray-200">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h3 className="text-center text-sm font-bold text-gray-500 uppercase tracking-wider mb-8">
                        Marcas que representamos
                    </h3>
                    <div className="flex flex-wrap justify-center items-center gap-8">
                        {marcas.slice(0, 12).map((marca) => (
                            <div
                                key={marca.id}
                                className="w-24 h-24 bg-gray-50 rounded-lg border border-gray-200 flex items-center justify-center p-3 hover:border-[#EA0A2A] hover:shadow-md transition-all"
                                title={marca.nombre}
                            >
                                {marca.logo ? (
                                    <img
                                        src={marca.logo}
                                        alt={marca.nombre}
                                        className="max-w-full max-h-full object-contain"
                                    />
                                ) : (
                                    <span className="text-xs font-bold text-gray-400 text-center">
                                        {marca.nombre}
                                    </span>
                                )}
                            </div>
                        ))}
                    </div>
                </div>
            </section>

            {/* Servicios Destacados */}
            <section className="py-16 bg-gray-50">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="text-center mb-12">
                        <h2 className="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                            Nuestros Servicios
                        </h2>
                        <p className="text-lg text-gray-600 max-w-2xl mx-auto">
                            Soluciones integrales con soporte técnico experto
                        </p>
                    </div>

                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        {serviciosDestacados.map((servicio) => (
                            <ServiceCard key={servicio.id} servicio={servicio} />
                        ))}
                    </div>

                    <div className="text-center mt-8">
                        <a
                            href="/servicios"
                            className="inline-flex items-center gap-2 text-[#EA0A2A] hover:text-[#C10923] font-semibold text-lg transition-colors"
                        >
                            Ver todos los servicios
                            <svg className="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </section>

            {/* Aplicaciones por Industria */}
            <section className="py-16 bg-white">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="text-center mb-12">
                        <h2 className="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                            Aplicaciones por Industria
                        </h2>
                        <p className="text-lg text-gray-600 max-w-2xl mx-auto">
                            Soluciones especializadas para cada sector industrial
                        </p>
                    </div>

                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        {industrias.map((industria) => (
                            <IndustryCard key={industria.id} industria={industria} />
                        ))}
                    </div>

                    <div className="text-center mt-8">
                        <a
                            href="/aplicaciones"
                            className="inline-flex items-center gap-2 text-[#EA0A2A] hover:text-[#C10923] font-semibold text-lg transition-colors"
                        >
                            Ver todas las aplicaciones
                            <svg className="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </section>

            {/* CTA Final */}
            <section className="py-16 bg-gradient-to-r from-[#EA0A2A] to-[#9A0820] text-white">
                <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h2 className="text-3xl sm:text-4xl font-bold mb-4">
                        ¿Necesitas asesoría técnica?
                    </h2>
                    <p className="text-lg text-white/90 mb-8">
                        Nuestro equipo de especialistas está listo para ayudarte a encontrar la solución perfecta para tu operación.
                    </p>
                    <div className="flex flex-col sm:flex-row gap-4 justify-center">
                        <a
                            href="https://wa.me/59177306576?text=Hola%2C%20necesito%20asesor%C3%ADa%20t%C3%A9cnica"
                            target="_blank"
                            rel="noopener noreferrer"
                            className="inline-flex items-center justify-center gap-2 bg-green-600 text-white px-8 py-4 rounded-md hover:bg-green-700 transition-all font-semibold text-lg shadow-lg"
                        >
                            <svg className="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            WhatsApp
                        </a>
                        <a
                            href="/sucursales"
                            className="inline-flex items-center justify-center gap-2 bg-white text-[#EA0A2A] px-8 py-4 rounded-md hover:bg-gray-100 transition-all font-semibold text-lg shadow-lg"
                        >
                            Ver Sucursales
                        </a>
                    </div>
                </div>
            </section>
        </GuestLayout>
    );
}
