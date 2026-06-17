import BranchCard from '@/components/contactos/BranchCard';
import Breadcrumbs from '@/components/layouts/globals/Breadcrumbs';
import GuestLayout from '@/layouts/GuestLayout';
import type { Sucursal } from '@/types';

interface SucursalesIndexProps {
    sucursalPrincipal: Sucursal | null;
    otrasSucursales: Sucursal[];
}

export default function SucursalesIndex({ sucursalPrincipal, otrasSucursales }: SucursalesIndexProps) {
    const breadcrumbs = [{ label: 'Sucursales' }];

    return (
        <GuestLayout
            title="Sucursales - Correas Center"
            description="Encuentra nuestras sucursales en Santa Cruz de la Sierra y Montero. Visítanos o contáctanos."
        >
            <section className="bg-gradient-to-br from-[#EA0A2A] to-[#9A0820] text-white py-16">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <Breadcrumbs items={breadcrumbs} className="mb-6 text-white/80" />
                    <h1 className="text-4xl sm:text-5xl font-bold mb-4">Nuestras Sucursales</h1>
                    <p className="text-xl text-white/90 max-w-3xl">
                        Cobertura estratégica en Santa Cruz de la Sierra para atenderte mejor.
                    </p>
                </div>
            </section>

            <section className="py-16 bg-gray-50">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    {/* Sucursal Principal */}
                    {sucursalPrincipal && (
                        <div className="mb-12">
                            <h2 className="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                                <span className="text-[#EA0A2A]">★</span> Sucursal Principal
                            </h2>
                            <BranchCard sucursal={sucursalPrincipal} />
                        </div>
                    )}

                    {/* Otras Sucursales */}
                    {otrasSucursales.length > 0 && (
                        <div>
                            <h2 className="text-2xl font-bold text-gray-900 mb-6">Otras Sucursales</h2>
                            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                {otrasSucursales.map((sucursal) => (
                                    <BranchCard key={sucursal.id} sucursal={sucursal} />
                                ))}
                            </div>
                        </div>
                    )}
                </div>
            </section>
        </GuestLayout>
    );
}
