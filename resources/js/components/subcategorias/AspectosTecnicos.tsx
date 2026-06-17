import { CheckCircle } from 'lucide-react';

interface TechnicalSpecsProps {
    caracteristicas: Record<string, any>;
}

export default function TechnicalSpecs({ caracteristicas }: TechnicalSpecsProps) {
    if (!caracteristicas || Object.keys(caracteristicas).length === 0) {
        return null;
    }

    return (
        <div className="bg-white rounded-xl shadow-md p-6 border border-gray-100">
            <h3 className="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                <div className="w-1 h-8 bg-[#EA0A2A] rounded-full"></div>
                Características Técnicas
            </h3>
            <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                {Object.entries(caracteristicas).map(([key, value]) => (
                    <div key={key} className="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                        <CheckCircle size={20} className="text-[#EA0A2A] flex-shrink-0 mt-0.5" />
                        <div>
                            <p className="text-xs text-gray-500 uppercase font-semibold tracking-wider">
                                {key.replace(/_/g, ' ')}
                            </p>
                            <p className="text-gray-900 font-medium">
                                {Array.isArray(value) ? value.join(', ') : String(value)}
                            </p>
                        </div>
                    </div>
                ))}
            </div>
        </div>
    );
}
