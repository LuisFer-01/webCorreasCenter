import { Briefcase } from 'lucide-react';

interface ApplicationsListProps {
    aplicaciones: string[];
}

export default function ApplicationsList({ aplicaciones }: ApplicationsListProps) {
    if (!aplicaciones || aplicaciones.length === 0) {
        return null;
    }

    return (
        <div className="bg-white rounded-xl shadow-md p-6 border border-gray-100">
            <h3 className="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                <div className="w-1 h-8 bg-[#EA0A2A] rounded-full"></div>
                Aplicaciones
            </h3>
            <div className="grid grid-cols-1 sm:grid-cols-2 gap-3">
                {aplicaciones.map((app, index) => (
                    <div
                        key={index}
                        className="flex items-center gap-3 p-3 bg-gradient-to-r from-gray-50 to-white rounded-lg border border-gray-100 hover:border-[#EA0A2A]/30 transition-colors"
                    >
                        <Briefcase size={18} className="text-[#EA0A2A] flex-shrink-0" />
                        <span className="text-gray-700 font-medium">{app}</span>
                    </div>
                ))}
            </div>
        </div>
    );
}
