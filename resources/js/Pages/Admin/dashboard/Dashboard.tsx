import DashboardLayout from '@/Layouts/DashboardLayout';
import * as React from 'react';
import confetti from "canvas-confetti";
import Header from './components/Header';
import { Button, Typography } from '@mui/material';
import { ConfettiButton } from '@/Components/ui/confetti';

export default function Dashboard(props: { disableCustomTheme?: boolean }) {
  const handleClick = () => {
    const end = Date.now() + 3 * 1000; // 3 seconds
    const colors = ["#a786ff", "#fd8bbc", "#eca184", "#f8deb1"];

    const frame = () => {
      if (Date.now() > end) return;

      confetti({
        particleCount: 2,
        angle: 60,
        spread: 55,
        startVelocity: 60,
        origin: { x: 0, y: 0.5 },
        colors: colors,
      });
      confetti({
        particleCount: 2,
        angle: 120,
        spread: 55,
        startVelocity: 60,
        origin: { x: 1, y: 0.5 },
        colors: colors,
      });

      requestAnimationFrame(frame);
    };

    frame();
  };
  return (
    <DashboardLayout title='Dashboard'>
      <Header title='Dashboard' list={['Dashboard', 'Overview']} />
      
      <Button onClick={handleClick}>Confetti 🎉</Button>

    </DashboardLayout>
  );
}
