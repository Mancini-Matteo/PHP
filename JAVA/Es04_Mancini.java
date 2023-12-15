import java.net.DatagramPacket;
import java.net.InetAddress;
import java.net.MulticastSocket;
import java.net.NetworkInterface;
import java.util.Scanner;

public class MulticastChat {

    private static final String LOCAL_IP = "127.0.0.1";
    private static final String MULTICAST_IP = "230.0.0.1";
    private static final int MULTICAST_PORT = 8888;

    public static void main(String[] args) {
        try {
            // Creazione del gruppo multicast
            InetAddress multicastGroup = InetAddress.getByName(MULTICAST_IP);

            // Creazione della socket per la comunicazione multicast
            MulticastSocket multicastSocket = new MulticastSocket(MULTICAST_PORT);

            // Associazione della socket all'interfaccia di rete
            NetworkInterface networkInterface = NetworkInterface.getByInetAddress(InetAddress.getByName(LOCAL_IP));
            multicastSocket.setNetworkInterface(networkInterface);

            // Associazione della socket al gruppo multicast
            multicastSocket.joinGroup(multicastGroup);

            // Thread per la ricezione dei messaggi multicast
            Thread receiverThread = new Thread(new Runnable() {
                @Override
                public void run() {
                    try {
                        while (true) {
                            // Creazione del pacchetto per la ricezione dei dati
                            byte[] buffer = new byte[1024];
                            DatagramPacket packet = new DatagramPacket(buffer, buffer.length);

                            // Ricezione del pacchetto
                            multicastSocket.receive(packet);

                            // Stampo a schermo info e dati ricevuti
                            String receivedMessage = new String(packet.getData(), 0, packet.getLength());
                            System.out.println("Messaggio ricevuto da " + packet.getAddress() + ": " + receivedMessage);

                            // Se il messaggio è "exit" termina il programma
                            if (receivedMessage.equalsIgnoreCase("exit")) {
                                break;
                            }
                        }
                    } catch (Exception e) {
                        e.printStackTrace();
                    }
                }
            });
            receiverThread.start();

            // Thread per l'invio dei messaggi
            Thread senderThread = new Thread(new Runnable() {
                @Override
                public void run() {
                    try {
                        Scanner scanner = new Scanner(System.in);
                        while (true) {
                            String msg = scanner.nextLine();
                            // Creazione del pacchetto per l'invio dei dati
                            byte[] buffer = msg.getBytes();
                            DatagramPacket packet = new DatagramPacket(buffer, buffer.length, multicastGroup, MULTICAST_PORT);

                            // Invio del pacchetto
                            multicastSocket.send(packet);

                            // Se il messaggio è "exit" termina il programma
                            if (msg.equalsIgnoreCase("exit")) {
                                break;
                            }
                        }
                        scanner.close();
                    } catch (Exception e) {
                        e.printStackTrace();
                    }
                }
            });
            senderThread.start();

            // Attendi la terminazione dei thread
            receiverThread.join();
            senderThread.join();

            // Fine della comunicazione
            // Disassociazione della socket dal gruppo multicast
            multicastSocket.leaveGroup(multicastGroup);

            // Chiusura della socket
            multicastSocket.close();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
