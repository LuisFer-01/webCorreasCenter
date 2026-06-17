import Breadcrumbs from '@/components/layouts/globals/Breadcrumbs';
import TechnicalSpecs from '@/components/subcategorias/AspectosTecnicos';
import ProductConstruction from '@/components/subcategorias/ConstrucionProducto';
import ApplicationsList from '@/components/subcategorias/ListaAplicaciones';
import ProductMeasurements from '@/components/subcategorias/MedidasProducto';
import ProductRange from '@/components/subcategorias/RangoProducto';
import SubcategoryCard from '@/components/subcategorias/SubcategoryCard';
import GuestLayout from '@/layouts/GuestLayout';

interface SubcategoryShowProps {
    subcategoria: {
        id: number;
        nombre: string;
        slug: string;
        descripcion?: string;
        imagen?: string;
        marcas_disponibles?: Array<{ id: number; nombre: string; logo: string }>;
    };
    categoria: {
        nombre: string;
        slug: string;
    };
    detalles: {
        caracteristicas: Record<string, any>;
        gama_productos: Record<string, any>;
        medidas_productos: Record<string, any>;
        construccion: Record<string, string>;
        aplicaciones: string[];
        tiene_caracteristicas: boolean;
        tiene_gama_productos: boolean;
        tiene_medidas: boolean;
        tiene_construccion: boolean;
        tiene_aplicaciones: boolean;
    } | null;
    subcategoriasHermanas: Array<{
        nombre: string;
        slug: string;
        imagen?: string;
    }>;
    otrasCategorias?: Array<{ nombre: string; slug: string }>;
}

export default function SubcategoryShow({
    subcategoria,
    categoria,
    detalles,
    subcategoriasHermanas,
    otrasCategorias = [],
}: SubcategoryShowProps) {
    const breadcrumbs = [
        { label: 'Categorías', href: '/categorias' },
        { label: categoria.nombre, href: `/categoria/${categoria.slug}` },
        { label: subcategoria.nombre },
    ];

    const whatsappMessage = `Hola, me interesa obtener más información sobre ${subcategoria.nombre} (${categoria.nombre}).`;
    const whatsappUrl = `https://wa.me/59177306576?text=${encodeURIComponent(whatsappMessage)}`;

    return (
        <GuestLayout
            title={`${subcategoria.nombre} - ${categoria.nombre} | Correas Center`}
            description={subcategoria.descripcion || `Detalles técnicos de ${subcategoria.nombre}`}
        >
            {/* Hero */}
            <section className="relative bg-gradient-to-br from-[#EA0A2A] to-[#9A0820] text-white py-20 overflow-hidden">
                {subcategoria.imagen && (
                    <div className="absolute inset-0">
                        <img src={subcategoria.imagen} alt="" className="w-full h-full object-cover opacity-20" />
                        <div className="absolute inset-0 bg-gradient-to-r from-[#EA0A2A]/95 to-[#EA0A2A]/70"></div>
                    </div>
                )}
                <div className="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <Breadcrumbs items={breadcrumbs} className="mb-6 text-white/80" />
                    <p className="text-white/80 text-sm uppercase tracking-wider mb-2">{categoria.nombre}</p>
                    <h1 className="text-4xl sm:text-5xl font-bold mb-4">{subcategoria.nombre}</h1>
                    {subcategoria.descripcion && (
                        <p className="text-xl text-white/90 max-w-3xl leading-relaxed">
                            {subcategoria.descripcion}
                        </p>
                    )}
                </div>
            </section>

            {/* Marcas */}
            {subcategoria.marcas_disponibles && subcategoria.marcas_disponibles.length > 0 && (
                <section className="py-8 bg-white border-b border-gray-200">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <h3 className="text-sm font-bold text-gray-500 uppercase tracking-wider mb-4">
                            Marcas disponibles
                        </h3>
                        <div className="flex flex-wrap gap-4">
                            {subcategoria.marcas_disponibles.map((marca) => (
                                <div
                                    key={marca.id}
                                    className="w-20 h-20 bg-gray-50 rounded-lg border border-gray-200 flex items-center justify-center p-2 hover:border-[#EA0A2A] transition-all"
                                    title={marca.nombre}
                                >
                                    {marca.logo ? (
                                        <img src={marca.logo} alt={marca.nombre} className="w-full h-full object-contain" />
                                    ) : (
                                        <span className="text-xs font-bold text-gray-400">{marca.nombre}</span>
                                    )}
                                </div>
                            ))}
                        </div>
                    </div>
                </section>
            )}

            {/* Contenido Técnico */}
            <section className="py-16 bg-gray-50">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
                    {detalles ? (
                        <>
                            {detalles.tiene_caracteristicas && (
                                <TechnicalSpecs caracteristicas={detalles.caracteristicas} />
                            )}
                            {detalles.tiene_gama_productos && (
                                <ProductRange gama_productos={detalles.gama_productos} />
                            )}
                            {detalles.tiene_medidas && (
                                <ProductMeasurements medidas_productos={detalles.medidas_productos} />
                            )}
                            {detalles.tiene_construccion && (
                                <ProductConstruction construccion={detalles.construccion} />
                            )}
                            {detalles.tiene_aplicaciones && (
                                <ApplicationsList aplicaciones={detalles.aplicaciones} />
                            )}
                        </>
                    ) : (
                        <div className="bg-white rounded-xl p-12 text-center">
                            <p className="text-gray-600">
                                Los detalles técnicos de esta subcategoría están en proceso de carga.
                            </p>
                        </div>
                    )}
                </div>
            </section>

            {/* CTA WhatsApp */}
            <section className="py-12 bg-gradient-to-r from-green-600 to-green-700 text-white">
                <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h2 className="text-3xl font-bold mb-4">¿Necesitas cotizar este producto?</h2>
                    <p className="text-lg text-white/90 mb-6">
                        Escríbenos directamente por WhatsApp y te atenderemos de inmediato.
                    </p>
                    <a
                        href={whatsappUrl}
                        target="_blank"
                        rel="noopener noreferrer"
                        className="inline-flex items-center gap-2 bg-white text-green-700 px-8 py-4 rounded-md hover:bg-gray-100 transition-all font-semibold text-lg shadow-lg"
                    >
                        <svg className="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        Cotizar por WhatsApp
                    </a>
                </div>
            </section>

            {/* Subcategorías Hermanas */}
            {subcategoriasHermanas.length > 0 && (
                <section className="py-16 bg-white">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <h2 className="text-3xl font-bold text-gray-900 mb-8">
                            Otras subcategorías de {categoria.nombre}
                        </h2>
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            {subcategoriasHermanas.map((sub) => (
                                <SubcategoryCard key={sub.slug} subcategoria={sub} />
                            ))}
                        </div>
                    </div>
                </section>
            )}
        </GuestLayout>
    );
}
