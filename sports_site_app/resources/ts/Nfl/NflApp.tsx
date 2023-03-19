import { createRoot } from 'react-dom/client';
import Index from './Pages/Index';
import Standing from './Pages/Standing';

const NflApp = () => {
  const index = document.getElementById('index');
  const standing = document.getElementById('standing');

  if (index) createRoot(index).render(<Index />);
  if (standing) createRoot(standing).render(<Standing />);
}

export default NflApp;
